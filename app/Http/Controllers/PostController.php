<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function create(){
        $categories = Category::all();
        $data = [
            "categories" => $categories
        ];
        return view("post.create",$data);
    }
    public function store(Request $request){
        $formData = $request->all();
        $newPost = new Post();
        $newPost->fill($formData);
        $newPost->save();
        return redirect('home');
    }
    public function show($id){
        $post = Post::findOrFail($id);
        $user = $post->user;
        $category = $post->category;
        return view('post.show', ["post"=> $post, "user"=> $user, "category"=>$category]);
    }
    public function edit($id){
        $categories = Category::all();

        $post = Post::findOrFail($id);
        $data = [
            "post" => $post,
            "categories" => $categories
        ];
        return view('post.edit', $data);
    }
    public function update(Request $request,$id){
        $formData = $request->all();
        $post = Post::findOrFail($id);
        $post->update($formData);
        return redirect('home');
    }
    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('home');
    }
}
