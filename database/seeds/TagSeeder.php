<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $tags = [
        'freetime', 'work', 'business', 'trip', 'family', 'news', 'politics', 'relationships', 'economy', 'learn'
      ];
      foreach($tags as $tag){
      $newTag = new Tag();
      $newTag->name = $tag;
      $newTag->save();
      }
    }
}
