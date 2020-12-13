<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post){
        $replies = $post->replies()->with('author')->paginate(2);
        return view('posts.detail', compact('post', 'replies'));
    }

    public function store(PostRequest $postRequest){
        /*
         * Antes de enviar el porst es necesario saber que usuario esta haciendo el registro
         * $postRequest->merge(['user_id' => auth()->id()]);
         * Existe otra forma de hacerlo y es en el mismo modelo a traves del metodo boot
         */

        Post::create($postRequest->input());
        return back()->with('message', ['success', __('Post creado correctamente')]);
    }
}
