@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-1O">
            <h1>Index pubblica</h1>

            @foreach ($posts as $post)
                <p> <a href="{{ route('posts.show', ['slug' => $post->slug])}}">{{$post->title}}</a> </p>
            @endforeach
        </div>
    </div>
</div>
@endsection
