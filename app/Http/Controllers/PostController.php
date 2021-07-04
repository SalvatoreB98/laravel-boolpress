<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function create(){
        return view("post.create");
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
        return view('post.show', ["post"=> $post, "user"=> $user]);
    }
    public function edit($id){
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
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
