<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $data = [
            "categories" => $categories,
            "tags" => $tags
        ];

        return view("post.create", $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'category_id' => "nullable|exists:categories,id"
        ]);

        $formData = $request->all();
        $newPost = new Post();
        $newPost->fill($formData);

        if (key_exists("file", $formData)) {
            $storageResult = Storage::put("files", $formData["file"]);
            $newPost->file = $storageResult;
        }
        $newPost->save();
        if (key_exists("tags", $formData)) {
            $newPost->tags()->attach($formData["tags"]);
        }
        @dump($formData);
        return redirect('/');
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $user = $post->user;
        $category = $post->category;
        return view('post.show', ["post" => $post, "user" => $user, "category" => $category]);
    }
    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::findOrFail($id);
        $data = [
            "post" => $post,
            "categories" => $categories,
            "tags" => $tags
        ];
        return view('post.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $formData = $request->all();
        $post = Post::findOrFail($id);
        $post->tags()->detach();
        if (key_exists("tags", $formData)) {
            $post->tags()->attach($formData["tags"]);
        }
        if (key_exists("file", $formData)) {
            if ($post->file) {
                Storage::delete($post->file);
            }
            $storageResult = Storage::put("files", $formData["file"]);
            $post->file = $storageResult;
        }
        $post->update($formData);
        return redirect()->to('post/' . $id);
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->file) {
            Storage::delete($post->file);
        }
        $post->tags()->detach();
        $post->delete();
        return redirect('/admin/posts');
    }
}
