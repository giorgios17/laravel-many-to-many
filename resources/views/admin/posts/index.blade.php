@extends('layouts.dashboard')
@section('content')
    {{-- CREAZIONE DI UN NUOVO POST --}}
    <div class="create-post">
        <a class="btn btn-primary mb-3" href="{{ route('admin.posts.create') }}">New Post</a>
    </div>
    <div class="table">
        <table style="width:100%">
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Tags</th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>
                        @forelse ($post->tags as $tag)
                            #{{ $tag->name }}
                        @empty
                            <p>Nessun tag trovato</p>
                        @endforelse
                    </td>
                    <td>
                        {{-- LINK PER LA VISUALIZZAZIONE DEL POST --}}
                        <a href="{{ route('admin.posts.show', $post->id) }}">
                            <i class="fas fa-search fa-2xl"></i>
                        </a>
                        {{-- LINK ALLA PAGINA DI EDIT POST --}}
                        <a href="{{ route('admin.posts.edit', $post->id) }}">
                            <i class="fas fa-edit fa-2xl mx-3"></i>
                        </a>
                        {{-- BUTTON PER CANCELLARE UN POST --}}
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" class=" d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type='submit' onclick="return confirm('Sicuro di voler cancellare questo post?')"
                                type="submit" value="" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
