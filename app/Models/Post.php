<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'today_goal',
        'yell',
        'user_id',
        'get_up_time',
        'goal_time',
    ];
    
    public function getByLimit(int $limit_count = 7)
{
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
}

    public function getPaginateByLimit(int $limit_count = 7)
{
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
}

    //user=1:多=posts
    public function user()
{
    return $this->belongsTo(User::class);
}
}
