@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="text-center text-muted">{{ __("Respuestas al debate :name", ['name' => $post->title]) }}</h1>
            <h4>{{ __("Autor del debate") }} : {{ $post->owner->name }}</h4>

            <a href="/forums/{{ $post->forum->slug }}" class="btn btn-primary float-right">
                {{ __("Volver al foro :name", ["name" => $post->forum->name]) }}
            </a>
            <div class="clearfix"></div>
            <br>
            @forelse($replies as $reply)
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <p>{{ __("Respuesta de: ") }} : {{ $reply->author->name }}</p>
                    </div>
                    <div class="card-body">
                        {{ $reply->reply }}
                    </div>
                </div>
            @empty
                <div class="alert alert-danger">No existen respuestas disponibles</div>
            @endforelse
            @if($replies->count())
                {{ $replies->links() }}
            @endif
            @Logged()
                <h3 class="text-muted">{{ __("Añadir una nueva respuesta al post :name", ['name' => $post->name]) }}</h3>
                @include('partials.errors')
                <form method="post" action="/replies">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="form-group">
                        <label for="reply" class="col-md-12">{{ __("Respuesta") }}</label>
                        <textarea name="reply" id="reply" cols="30" rows="5" class="form-control">{{ old('reply') }}</textarea>
                    </div>
                    <button class="btn btn-success" type="submit"name="addReply">{{ __("Añadir respuesta") }}</button>
                </form>
            @else
                @include('partials.login_link', ['message' => __("Inicia session para responder")])
            @endLogged()
        </div>
    </div>
@endsection
