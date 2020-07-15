@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h1>DASHBOARD ADMIN</h1>
            <a class="btn btn-primary"href="{{ route('admin.posts.index') }}">Showami i POSTS!</a>
        </div>

    </div>

</div>
@endsection
