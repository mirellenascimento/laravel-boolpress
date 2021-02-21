<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $posts = Post::all();
      $tags = Tag::all();

      foreach($posts as $post){
        for($i = 1; $i <= rand(1, $tags->count()); $i++){
            DB::table('post_tag')->insert([
                'post_id' => $post->id,
                'tag_id' => $i,
                'created_at'=>Carbon::now()->toDateTimeString()
            ]);
        }
      }

    }
}
