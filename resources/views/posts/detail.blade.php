@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="text-center text-muted">{{ __("Respuestas al debate :name", ['name' => $post->title]) }}</h1>
            <h4>{{ __("Autor del debate") }} : {{ $post->owner->name }}</h4>

            <a href="/forums/{{ $post->forum->id }}" class="btn btn-primary float-right">
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
        </div>
    </div>
@endsection
