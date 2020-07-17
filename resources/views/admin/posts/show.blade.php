@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            <h1>INFORMAZIONI POST</h1>
            <a class="btn btn-primary"href="{{ route('admin.posts.index') }}">Showami i POSTS!</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 mt-4">
            <h3>Titolo: {{ $post->title }}</h3>

            <p>Contenuto: {{ $post->content}}</p>
            <p>Categoria: {{ $post->category->name ?? '-'}}</p>

            <p><small>creato il: {{$post->created_at}}</small></p>
            <small>modificato il: {{$post->updated_at}}</small>
        </div>

    </div>
</div>
@endsection
