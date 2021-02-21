<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['category_id', 'title', 'slug', 'image_url', 'description', 'user_id'];

    public function category(){
      return $this->belongsTo(Category::class);
    }

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }
}
