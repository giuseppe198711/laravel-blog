@extends('layouts.main')

@section('page-content')

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Riassunto</th>
                <th scope="col">Pubblicato</th>
                <th scope="col">Utente</th>
            </tr>
        </thead>
        <tbody>
        
            @foreach ($posts as $post)
            <tr>            
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->excerpt }}</td>
                <td>
                    @if ($post->published)
                        <span class="badge badge-success">Si</span>
                    @else
                        <span class="badge badge-danger">No</span>
                    @endif
                </td>
                <td>{{ $post->user->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection