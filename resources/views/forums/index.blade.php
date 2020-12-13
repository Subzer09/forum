@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="text-center text-muted">{{ __("Foros") }}</h1>
            @forelse($forums as $forum)
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <a href="/forums/{{ $forum->slug }}">{{ $forum->name }}</a>
                        <span class="float-right">
                            {{ __("Posts") }} : {{ $forum->posts->count() }},
                            {{ __("Respuestas") }} : {{ $forum->replies->count() }}
                        </span>
                    </div>
                    <div class="card-body">
                        {{ $forum->description }}
                    </div>
                </div>
            @empty
                <div class="alert alert-danger">No existen foros disponibles</div>
            @endforelse
            @if($forums->count())
                {{ $forums->links() }}
            @endif
            <h2>{{ __("Añadir un nuevo Foro") }}</h2>
            <hr>
            @include('partials.errors')

            <form method="post" action="/forums">
                @csrf
                <div class="form-group">
                    <label for="name" class="col-md-12 control-label">{{ __("Nombre") }}</label>
                    <input id="name" class="form-control" name="name" value="{{ old('name') }}"/>
                </div>
                <div class="form-group">
                    <label for="description" class="col-md-12 control-label">{{ __("Descripcion") }}</label>
                    <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                </div>
                <button class="btn btn-success" type="submit">{{ __("Añadir Foro") }}</button>
            </form>
        </div>
    </div>
@endsection
