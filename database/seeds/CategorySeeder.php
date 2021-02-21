<?php

use Illuminate\Database\Seeder;
use App\Category;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories = [
        'freetime', 'work', 'business', 'trip', 'family', 'news', 'politics', 'relationships', 'economy', 'learn'
      ];
      foreach($categories as $category){
      $newCategory = new Category();
      $newCategory->title = ucfirst($category);
      $newCategory->slug = 'caregory_'.$category;
      $newCategory->created_at = Carbon::now()->toDateTimeString();
      $newCategory->save();
      }
    }
}
