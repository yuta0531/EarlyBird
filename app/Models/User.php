<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'goal_time',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   //user=1:多=posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    //following=多:多=followed
    public function following(){
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
    }
    
    public function followed(){
        return $this->belongsToMany(User::class, 'follows', 'followed_id' , 'following_id');
    }
    
    //いいね機能
    public function likes()
    {
        return $this->hasMany(Like::class, 'user_id');
    }
}
