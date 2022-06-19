<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class MainController extends Controller
{
    public function index(){

        $posts = Post::all();

        return view('dashboard',compact('posts'));
    }


    public function form(){

        return view('add-new_article');
    }

    public function store(Request $request){

        $request ->validate([

            'name' => 'required|string|max:255',
            'text' => 'required|string',

        ]);

        Post::create($request->all());

        return redirect()->back()->with('status','Post added!');

    }

    public function delete($id){

        Post::where('id',$id)->delete();

        return redirect()->back()->with('status','Post was deleted');

    }
}