<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Category;
use App\Tag;
use App\User;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchInput = $request['search'];
        if ($searchInput !== null){
          $posts = Post::where('title', 'LIKE', "%$searchInput%")->orderBy('created_at', 'desc')->paginate();
        } else {
          $posts = Post::orderBy('created_at', 'desc')->paginate();
        }
        return view('posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
      $data = [
        'categories' => Category::all(),//collects all categories to display into select input
        'tags' => Tag::all(),//collects all tags to display into dropbox input
        'post' => $post//collects info fom the selected post
      ];
      return view('posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
      $data = $request->validated(); //collects all input

      if($data['new_category'] == null){
        $category = $data['category_id'];
      } else{
        $newCategory = Category::firstOrCreate([
          'title' => ucfirst($data['new_category']),
          'slug' => Str::slug($data['new_category'])
        ]);
        $newCategory->save();
        $category = $newCategory->id;
      }

      $newPost = Post::firstOrCreate([
        'title' => $data['title'],
        'slug' => Str::slug($data['title']),
        'image_url' => $data['image_url']->store('images'),
        'description' => $data['description'],
        'user_id' => Auth::user()->id,
        'category_id' => $category
      ]); //creates new Post and sets category_id

      $rawTags = explode(',', $data['tags']);
      foreach ($rawTags as $tag) {
          $tags[] = trim($tag);
      }

      foreach ($tags as $tag) {
        $newTag = Tag::firstOrCreate([
          'name' => $tag
        ]);

        $newPost->tags()->attach($newTag->id);
      }
      return redirect()->route('posts.show', $newPost->id);//redirects to new post page

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
      $data = [
        'categories' => Category::all(),//collects all categories to display into select input
        'tags' => Tag::all(),//collects all tags to display into dropbox input
        'post' => $post//collects info fom the selected post
      ];
      return view('posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
      $data = $request->validated(); //collects all input
      $post->update($data);

      if (isset($data['image_url'])) {
        $post->image_url = $data['image_url']->store('images');
        $post->save();
      }


      if($data['new_category'] !== null){
        $newCategory = Category::firstOrCreate([
          'title' => ucfirst($data['new_category']),
          'slug' => Str::slug($data['new_category'])
        ]);
        $newCategory->save();
        $post->category = $newCategory->id;
      }

      $post->tags()->detach();
      if(isset($data['selected_tags'])){
        $selectedTags = $data['selected_tags'];
        foreach ($selectedTags as $tagId) {
          $post->tags()->attach($tagId);
        }
      }

      $rawTags = explode(',', $data['tags']);
      foreach ($rawTags as $tag) {
          $tags[] = trim($tag);
      }

      foreach ($tags as $tag) {
        $newTag = Tag::firstOrCreate([
          'name' => $tag
        ]);

        $post->tags()->attach($newTag->id);
      }

      return redirect()->route('posts.show', $post->id);//redirects to edited post page

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('posts.index');
    }
}
