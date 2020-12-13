@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">

            <h1 class="text-center text-muted">{{ __("Post del foro :name", ['name' => $forum->name]) }}</h1>

            <a href="/" class="btn btn-primary float-right">
                {{ __("Volver al listado de los Foros") }}
            </a>

            <div class="clearfix"></div>
            <br>

            @forelse($posts as $post)
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                        <span class="float-right">{{ __("Owner") }} : {{ $post->owner->name }}</span>
                    </div>
                    <div class="card-body">
                        {{ $post->description }}
                    </div>
                </div>
            @empty
                <div class="alert alert-danger">No existen Posts disponibles</div>
            @endforelse
            @if($posts->count())
                {{ $posts->links() }}
            @endif
            @Logged()
                <h3 class="text-muted">{{ __("Añadir un nuevo post al foro :name", ["name" => $forum->name]) }}</h3>
                @include('partials.errors')
                <form method="post" action="/posts">
                    @csrf
                    <input type="hidden" name="forum_id" value="{{ $forum->id }}">
                    <div class="form-group">
                        <label for="title" class="col-md-12">{{ __("Titulo") }}</label>
                        <input id="title" name="title" class="form-control" value="{{ old('title') }}" />
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-md-12">{{ __("Descripcion") }}</label>
                        <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                    </div>
                    <button class="btn btn-success" type="submit" name="addPost">{{ __("Añadir post") }}</button>
                </form>
            @else
                @include('partials.login_link',['message' => __("Inicia sesion para crear un Post")])
            @endLogged
        </div>
    </div>
@endsection
