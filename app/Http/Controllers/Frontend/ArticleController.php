<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;

use View;
class ArticleController extends Controller
{
    protected $title = 'All Posts';
    protected $view  = 'article.';
    protected $route = 'frontend.';

    public function __construct(){

        View::share('route', $this->route);
        View::share('title', $this->title);
        View::share('view', $this->view);
    }

    // ========== Halaman all posts ==========
    public function allPosts()
    {
        View::share('breadcrumbs', [
            [$this->title, route($this->route.'all_post')],
            ['List '.$this->title, null]
        ]);

        if (isset($_GET['tab'])) {
            $tab = $_GET['tab'];
        } else {
            $tab = Post::TAB_PUBLISH;
        }

        $data = Post::getPostByTab($tab);

        return view($this->view.'all_post', compact('tab', 'data'));
    }

    public function editAllPost($id)
    {
        View::share('breadcrumbs', [
            [$this->title, route($this->route.'all_post')],
            ['Edit '.$this->title, null]
        ]);

        $data = Post::getPostById($id);

        return view($this->view.'edit_all_post', compact('id', 'data'));
    }

    public function updateAllPost(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'title'   	=> 'required|min:20',
            'content' 	=> 'required|min:200',
			'category'	=> 'required|min:3',
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors());
        }

        $input = array(
            'title'     => $req->input('title'),
            'content'   => $req->input('content'),
            'category'  => $req->input('category'),
        );

        $query = Post::where('id', $id)->update($input);

        if ($query) {
            return redirect()->route('frontend.all_post')->with('success','Data berhasil diupdate');
        }else{
            return back()->with('error','Data gagal diupdate');
        }
    }

    public function deleteAllPost($id)
    {
        $query = Post::where('id', $id)->update([
            'status' => Post::TAB_THRASH
        ]);

        if ($query) {
            return back()->with('success','Data berhasil dihapus, bisa lihat di tab trash');
        }else{
            return back()->with('error','Data gagal dihapus');
        }
    }

    public function publishAllPost($id)
    {
        $query = Post::where('id', $id)->update([
            'status' => Post::TAB_PUBLISH
        ]);

        if ($query) {
            return redirect()->route('frontend.all_post')->with('success','Data berhasil di publish');
        }else{
            return back()->with('error','Data gagal dirubah');
        } 
    }

    public function draftAllPost($id)
    {
        $query = Post::where('id', $id)->update([
            'status' => Post::TAB_DRAFT
        ]);

        if ($query) {
            return redirect()->route('frontend.all_post')->with('success','Data berhasil masuk ke draft');
        }else{
            return back()->with('error','Data gagal dirubah');
        } 
    }

    public function preview(Request $req)
    {
        View::share('breadcrumbs', [
            ['Preview', route('frontend.preview')],
            ['Preview Artikel', null]
        ]);

        if($req->ajax()) {
            $query  = Post::where('status', Post::TAB_PUBLISH);
            
            $data   = $query->orderBy('id', 'desc')->paginate(10);
            return view($this->view.'list-preview')->with(compact('data'));
        };

        return view($this->view.'preview');
    }
}
