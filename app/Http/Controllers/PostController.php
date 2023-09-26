<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;
use DateTime;

class PostController extends Controller
{
    public function index(Post $post, Request $request)
    {
        return view('posts/index')->with(['posts' => $post ->where('user_id', Auth::id())->get()]);
    }

    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create()
    {
        //目標時間を設定しなかった人用（登録をくしてプロフィール＆フレンド画面に飛ばなかった人用）
        $user = Auth::user();
        if ($user && $user->goal_time === null){
            $user->goal_time = '2000-09-19 00:00:00';
            $user->save();
        }
        return view('posts.create');
    }

    public function friendtime(Post $post, User $user, Follow $follow)
    {
        $my_id = Auth::id();
        $friends = User::find($my_id)->following;
        $friendPosts = Post::whereIn('user_id', $friends->pluck('id'))->orderBy('created_at', 'desc')->get();
        return view('posts.friendtime')->with(['friendPosts' => $friendPosts]);
    } 
    


    public function store(Post $post, User $user, Request $request)
    {
        $input = $request['post'];
        $input['user_id'] = Auth::id();
        $input['get_up_time'] = now(); // 現在の日時を記録
        $user = Auth::user();
        $input['goal_time'] = $user->goal_time;
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
}