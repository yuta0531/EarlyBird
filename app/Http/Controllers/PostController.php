<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
use App\Models\Comment;
use DateTime;
use OpenAI\Laravel\Facades\OpenAI;

class PostController extends Controller
{
    public function index(Post $post, Request $request)
    {   
        return view('posts/index')->with(['posts' => $post ->where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(7)]);
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

    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }

    public function store(Post $post, User $user, PostRequest $request)
    {
        $input = $request['post'];
        $input['user_id'] = Auth::id();
        $input['get_up_time'] = now(); // 現在の日時を記録
        $user = Auth::user();
        $input['goal_time'] = $user->goal_time;
        
        if ($request->has('myCheckbox')) {
            $today_goal = $input['today_goal'];//チャットGPTを使う場合（以下2行）
        $input['yell'] = $this->chatGPTresponse($today_goal);
        } 
        else {
        $input['yell'] = $this->randomResponse();//チャットGPTを使わない場合
        }
        
        $post->fill($input)->save();
        
        return redirect('/posts/' . $post->id);
    }

        //チャットGPTを使わない場合
///////////////////////////////////////////////////
    public function randomResponse() {
        $randomNumber = rand();
        if ($randomNumber % 8 == 0){
            $yell = '今日も一歩前進しよう!';
        }
        elseif($randomNumber % 8 == 1){
            $yell = 'いい目標だ！';
        }
        elseif($randomNumber % 8 == 2){
            $yell = '自信をもっていこう！';
        }
        elseif($randomNumber % 8 == 3){
            $yell = '今日の努力は、明日への一歩になる！';
        }
        elseif($randomNumber % 8 == 4){
            $yell = '毎日がチャンス！';
        }
        elseif($randomNumber % 8 == 5){
            $yell = '最高の1日にしよう！';
        }
        elseif($randomNumber % 8 == 6){
            $yell = "It's a piece of cake！";
        }
        else{
            $yell = 'できる！できる！君ならできる！';
        }
        return $yell;
    }

        //チャットGPTを使う場合
///////////////////////////////////////////////////
    public function chatGPTresponse($today_goal) {
        $result = OpenAI::completions()->create([
            'model' => 'gpt-3.5-turbo-instruct-0914',
            'prompt' => $today_goal.'、この目標を30文字程度で応援してください。',
            'temperature' => 0.8,
            'max_tokens' => 150,
        ]);
        return $result['choices'][0]['text'];;
    }
    
    
    public function comment(Comment $comment, Request $request){
        $input=$request['comment'];
        $comment->fill($input)->save();
        
        return redirect('/posts/' . $comment->post_id);
    }

}