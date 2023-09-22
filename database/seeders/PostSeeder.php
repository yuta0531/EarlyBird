<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'today_goal' => '腕立て100回',
            'yell' => 'Fidht！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
    }
}
