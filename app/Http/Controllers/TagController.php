<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
class TagController extends Controller
{
    function show(){
        $tags = Tag::all();
        return view('admin.tags',compact('tags'));
    }
}
