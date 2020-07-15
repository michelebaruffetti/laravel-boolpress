@extends('layouts/dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-1O">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Tutti i post!</h1>
                    <a class="btn btn-primary"
                        href="{{ route('admin.posts.create') }}">
                            Nuovo post
                    </a>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titolo</th>
                            <th>Slug</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>

                                <td>
                                    <a class="btn btn-small btn-info"
                                    href="{{ route('admin.posts.show', ['post' => $post->id]) }}">
                                        Dettaglio
                                    </a>
                                    <a class="btn btn-small btn-warning" href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">
                                        Modifica
                                    </a>
                                    <form class="d-inline" action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-small btn-danger" value="Elimina">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    Non è presente alcun post
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
