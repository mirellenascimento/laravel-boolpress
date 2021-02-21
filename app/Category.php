<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['title', 'slug'];

    public function post(){
      return $this->hasMany(Post::class);
    }
}
