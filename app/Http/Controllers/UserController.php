<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;
use DateTime;

class UserController extends Controller
{
    public function profile(User $user)
    {
        return view('users/profile')->with(['users' => $user->get()]);
    }

    public function my_profile(User $user, Follow $follow)
    {
        $user = Auth::user();
        if ($user && $user->goal_time === null){
            $user->goal_time = '2000-09-19 00:00:00';
            $user->save();
        }
        $my_id = Auth::id();
        $follows = User::find($my_id)->following()->orderBy('id')->get();
        $followeds = User::find($my_id)->followed()->orderBy('id')->get();
        return view('users/my_profile')->with(['follows' => $follows, 'followeds' => $followeds, 'my_id' => $my_id]);
    } 
    
    public function follow(User $user, Follow $follow, Request $request)
    {
        $input['following_id'] = Auth::id();
        $input['followed_id'] = $user->id;
        $follow->fill($input)->save();
        return redirect('users/my_profile');
    }
    
    public function search(User $user, Follow $follow, Request $request)
    {
        $nickname = $request->input('nickname');
        $query = User::query();
        if(!empty($nickname)) {
            $query->where('name', 'LIKE', "%{$nickname}%");
            $user =$query;
        }
        $user =$query;
        return view('users/search')->with(['users' => $user->get()]);
    }
    
    public function unfollow(Follow $follow, Request $request)
    {
        Follow::where('following_id', Auth::id())->where('followed_id', $request->followed_id)->delete();
        return redirect('users/my_profile');
    }

    public function goal_time_set(Request $request, User $user)
    {
        $input_time = $request['my_id'];
        $input_time['goal_time'] = '2000-09-19 '.$input_time['goal_time'];
        $user->fill($input_time)->save();
        return redirect('users/my_profile');
    }
    
}