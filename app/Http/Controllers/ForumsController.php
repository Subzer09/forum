<?php

namespace App\Http\Controllers;

use App\Forum;
use Illuminate\Http\Request;

class ForumsController extends Controller
{
    public function index(){
        $forums = Forum::with(['posts','replies'])->paginate(4);
        return view('forums.index', compact('forums'));
    }

    public function show(Forum $forum){
        $posts = $forum->posts()->with(['owner'])->paginate(2);
        return view('forums.detail', compact('forum', 'posts'));
    }

    public function store(){
        $this->validate(\request(),[
            'name' => 'required|max:100|unique:forums',
            'description' => 'required|max:500'
        ]);
        Forum::create(request()->all());
        return back()->with('message',['success' , __('Foro creado satisfactoriamente')]);
    }
}

