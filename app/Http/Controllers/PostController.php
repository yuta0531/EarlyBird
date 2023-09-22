<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DateTime;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }

    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create()
    {
        return view('posts.create');
    }

    public function friendtime(Post $post)
    {
        return view('posts/friendtime')->with(['posts' => $post->getPaginateByLimit()]);
    }


    public function store(Post $post, Request $request)
    {
        $input = $request['post'];
        $input['user_id'] = Auth::id();
        $input['get_up_time'] = now(); // 現在の日時を記録
        $input['goal_time'] = '2000-09-19 '.$input['goal_time'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }

    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
   
    public function stamp(Post $post)
    {
        return view('posts/stamp')->with(['post' => $post]);
    }

    public function stampon(Request $request, Post $post)
    {
        $input_goal = $request['post'];
        $post->fill($input_goal)->save();
        $post->get_up_time = now(); // 現在の日時を記録
        $post->save();
        return redirect('/posts/' . $post->id);
    }
}