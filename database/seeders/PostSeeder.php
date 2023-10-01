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
            'goal_time' => '2000-09-20 07:00:00',
            'get_up_time' => '2000-09-20 04:00:00',
            'yell' => 'それを聞けるのは私ではない、ユーマ自身だ',
            'created_at' => '2000-09-20 04:00:00',
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'today_goal' => '2',
            'user_id'=> '4',
            'goal_time' => '2000-09-19 07:00:00',
            'get_up_time' => '2000-09-21 04:30:00',
            'yell' => 'それを聞けるのは私ではない、ユーマ自身だ',
            'created_at' => '2000-09-21 04:30:00',
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'today_goal' => '3',
            'user_id'=> '4',
            'goal_time' => '2000-09-19 07:00:00',
            'get_up_time' => '2000-09-22 03:30:00',
            'yell' => 'それを聞けるのは私ではない、ユーマ自身だ',
            'created_at' => '2000-09-22 03:30:00',
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'today_goal' => '僕がそうするべきだと思っていることをする',
            'user_id'=> 5,
            'goal_time' => '2000-09-19 06:00:00',
            'get_up_time' => '2000-09-20 05:55:00',
            'yell' => '面倒見の鬼だな',
            'created_at' => '2000-09-20 05:55:00',
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'today_goal' => '宿題を知恵と工夫で何とかする',
            'user_id'=> 5,
            'goal_time' => '2000-09-19 07:00:00',
            'get_up_time' => '2000-09-21 06:50:00',
            'yell' => '面倒見の鬼だな',
            'created_at' => '2000-09-21 05:55:00',
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'today_goal' => '明日の試合に勝つための戦術を考える',
            'user_id'=> 5,
            'goal_time' => '2000-09-19 06:30:00',
            'get_up_time' => '2000-09-22 06:00:00',
            'yell' => '面倒見の鬼だな',
            'created_at' => '2000-09-22 06:00:00',
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'today_goal' => '千佳１',
            'user_id'=> 6,
            'goal_time' => '2000-09-19 06:00:00',
            'get_up_time' => '2000-09-20 05:55:00',
            'yell' => '面倒見の鬼だな',
            'created_at' => '2000-09-20 05:55:00',
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'today_goal' => '千佳１',
            'user_id'=> 6,
            'goal_time' => '2000-09-19 06:30:00',
            'get_up_time' => '2000-09-21 06:30:00',
            'yell' => '面倒見の鬼だな',
            'created_at' => '2000-09-21 06:30:00',
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'today_goal' => '友達は私が守る',
            'user_id'=> 6,
            'goal_time' => '2000-09-19 07:00:00',
            'get_up_time' => '2000-09-22 06:55:00',
            'yell' => 'ナイスキル！',
            'created_at' => '2000-09-22 06:55:00',
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'today_goal' => 'ぼんち揚げを広める',
            'user_id'=> 7,
            'goal_time' => '2000-09-19 09:00:00',
            'get_up_time' => '2000-09-20 11:00:00',
            'yell' => 'きっとうまくいくよ、俺の再度エフェクトがそう言ってる',
            'created_at' =>'2000-09-20 11:00:00',
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'today_goal' => 'ぼんち揚げを広める',
            'user_id'=> 7,
            'goal_time' => '2000-09-19 09:00:00',
            'get_up_time' => '2000-09-21 10:30:00',
            'yell' => 'きっとうまくいくよ、俺の再度エフェクトがそう言ってる',
            'created_at' => '2000-09-21 10:30:00',
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'today_goal' => 'ぼんち揚げを広める',
            'user_id'=> 7,
            'goal_time' => '2000-09-19 06:00:00',
            'get_up_time' => '2000-09-22 06:00:00',
            'yell' => 'きっとうまくいくよ、俺の再度エフェクトがそう言ってる',
            'created_at' => '2000-09-22 06:00:00',
            'updated_at' => new DateTime(),
        ]);
    }
}
