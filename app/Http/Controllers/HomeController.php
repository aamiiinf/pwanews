<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function posts()
    {
        $posts = Post::get();
        return response()->json($posts);
    }
    public function post($id)
    {
      $post = Post::find($id);
      $user = Auth::user();
      $comments = $post->comments()->where('status', 1)->get();
      return response()->json(['post' => $post, 'comments' => $comments, 'user' => $user]);
    }

    public function show(Request $req)
    {
        $posts = $req;
        return response()->json($posts);
    }
}
