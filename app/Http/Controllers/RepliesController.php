<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Rules\ValidReply;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function store(){
        $this->validate(\request(),[
            'reply' => ['required', new ValidReply()],
        ]);

        Reply::create(\request()->input());
        return back()->with('message', ['success', __("Respuesta añadida correctamente")]);
    }
}
