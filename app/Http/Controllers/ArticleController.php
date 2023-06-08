<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

use App\Models\Post;

class ArticleController extends Controller
{
	private $limit = 10;
    private $offset = 0;

    public function createArticle(Request $req)
	{
		$validator = Validator::make($req->all(), [
            'title'   	=> 'required|min:20',
            'content' 	=> 'required|min:200',
			'category'	=> 'required|min:3',
			'status'	=> 'required|in:publish,draft,thrash'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

		$param = array(
			'title' => $req->input('title'),
			'content' => $req->input('content'),
			'category' => $req->input('category'),
			'status' => $req->input('status'),
		);

		$rst = Post::createPost($param);

		return response()->json([
			'title' => $rst->title,
			'content' => $rst->content,
			'category' => $rst->category,
			'status' => $rst->status,
		], Response::HTTP_CREATED);
	}

	public function getAllArticle(Request $req)
	{
		$query = Post::offset($req['offset'])->limit($req['limit'])->get();

		return response()->json($query, Response::HTTP_OK);		
	}

	public function getArticleById($id)
	{
		$query = Post::getPostById($id);

		return response()->json($query, Response::HTTP_OK);
	}

	public function updateArticle(Request $req, $id)
	{
		$validator = Validator::make($req->all(), [
            'title'   	=> 'required|min:20',
            'content' 	=> 'required|min:200',
			'category'	=> 'required|min:3',
			'status'	=> 'required|in:publish,draft,thrash'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

		$param = array(
			'title' => $req->input('title'),
			'content' => $req->input('content'),
			'category' => $req->input('category'),
			'status' => $req->input('status'),
		);

		$rst = Post::where('id', $id)->update($param);

		return response()->json((object) array(), Response::HTTP_CREATED);
	}

	public function deleteArticle($id)
	{
		$query = Post::deletePost($id);

		$rst = array(
			'success' => true,
			'message' => 'data berhasil dihapus'
		);

		return response()->json($rst, Response::HTTP_OK);
	}
}
