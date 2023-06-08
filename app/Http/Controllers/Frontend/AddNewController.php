<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Post;

use View;

class AddNewController extends Controller
{
    protected $title = 'Add New';
    protected $view  = 'article.';
    protected $route = 'frontend.';

    public function __construct(){

        View::share('route', $this->route);
        View::share('title', $this->title);
        View::share('view', $this->view);
    }

    public function formAddNew()
    {
        View::share('breadcrumbs', [
            [$this->title, route($this->route.'add_new.form')],
            ['Create '.$this->title, null]
        ]);

        return view($this->view.'create');
    }

    public function publishAddNew(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'title'   	=> 'required|min:20',
            'content' 	=> 'required|min:200',
			'category'	=> 'required|min:3',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error'     => true,
                'message'   => $validator->errors()
            ]);
        }

        $param = array(
			'title'     => $req->input('title'),
			'content'   => $req->input('content'),
			'category'  => $req->input('category'),
            'status'    => Post::TAB_PUBLISH
		);

		$rst = Post::createPost($param);

        return response()->json([
			'error' => false,
            'message' => 'Data berhasil dibuat'
		], Response::HTTP_CREATED);
    }

    public function draftAddNew(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'title'   	=> 'required|min:20',
            'content' 	=> 'required|min:200',
			'category'	=> 'required|min:3',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error'     => true,
                'message'   => $validator->errors()
            ]);
        }

        $param = array(
			'title'     => $req->input('title'),
			'content'   => $req->input('content'),
			'category'  => $req->input('category'),
            'status'    => Post::TAB_DRAFT
		);

		$rst = Post::createPost($param);

        return response()->json([
			'error' => false,
            'message' => 'Data berhasil dibuat'
		], Response::HTTP_CREATED);
    }
}
