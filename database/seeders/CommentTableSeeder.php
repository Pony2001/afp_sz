<?php

namespace Database\Seeders;
use App\Models\Comment;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = new Comment;
        $comment->employee_id = 1;
        $comment->value = "⭐⭐⭐⭐⭐" ;
        $comment->comment = "Very Good !";
        $comment->save();

    }
}
