<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'today_goal' => '勝ち目が薄いからって逃げるわけにはいかない',
            'user_id'=> '4',
            'goal_time' => '2000-09-19 00:00:00',
            'get_up_time' => '2000-09-19 00:01:00',
            'yell' => 'それを聞けるのは私ではない、ユーマ自身だ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'today_goal' => '僕がそうするべきだと思っていることをする',
            'user_id'=> 5,
            'yell' => '面倒見の鬼だな',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'today_goal' => '友達は私が守る',
            'user_id'=> 6,
            'yell' => 'ナイスキル！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'today_goal' => 'ぼんち揚げを広める',
            'user_id'=> 7,
            'yell' => 'きっとうまくいくよ、俺の再度エフェクトがそう言ってる',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
