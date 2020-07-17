@extends('layouts/dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-1O">
                <h1>Modifica post!</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="" action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="titolo">Titolo</label>
                        <input type="text" name="title" class="form-control" id="titolo" placeholder="Titolo post" value="{{ old('title', $post->title) }}">
                    </div>
                    <div class="form-group">
                        <label for="testo">Testo articolo</label>
                        <textarea type="text" name="content" class="form-control" id="testo" placeholder="Scrivi qualcosa ...">{{ old('content', $post->content) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="categoria"></label>
                        <select id="categoria "class="form-control" name="category_id">
                            <option value="">Seleziona Categoria</option>
                            @foreach ($categories as $category )
                                 <option value="{{$category->id}}"
                                     {{($post->category->id ?? '') == $category->id ? 'selected' : ''}}>
                                     {{$category->name}}
                                 </option>
                            @endforeach
                        </select>

                    </div>
                    <button type="submit" class="btn btn-primary">Salva</button>

                </form>
            </div>
        </div>
    </div>

@endsection
