<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;

class PostController extends Controller
{
	public function getDashboard()
	{
		$posts = Post::all();
		return view('dashboard', ['posts'=>$posts]);
	}

	public function postCreatePost(Request $request)
	{
		$rule = [

			'body' => 'required|max:1000'

		];

		$this->validate($request,$rule);

		$post = new Post();
		$post->body = $request['body'];

		$message = 'There is an error';

		if($request->user()->posts()->save($post))
		{
			$message = 'Post successfully created!';
		}

		return redirect()->route('dashboard')->with(['message'=>$message]);
	}

	public function getDeletePost($post_id)
	{
		$post = Post::where('id', $post_id)->first();

		$post->delete();

		return redirect()->route('dashboard')->with(['message'=>'Successfully deleted!']);

		// or you can use
		// $post = Post::find($post_id)->first();
	}
}

?>