@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-10">
            <h1>{{ $post->title}}</h1>

                <p> {{$post->content}}

                <p><small>categoria: {{$post->category->name ?? '-'}} </small> </p>
                <p><small>slug: {{$post->slug }} </small> </p>

        </div>
    </div>
</div>
@endsection
