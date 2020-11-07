@extends('layouts.main')

@section('page-content')
    <div class="container">
        <h1>Crea un nuovo Post</h1>

        <form action="{{ route("posts.store") }}" method="post">
            @csrf
            @method("POST")

            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Titolo" value="{{old("title")}}">
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{old("slug")}}">
            </div>

            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="Contenuto"> {{old("content")}} </textarea>
            </div>

            <div class="form-group">
                <label for="excerpt">Riassunto</label>
                <textarea class="form-control" name="excerpt" id="excerpt" cols="30" rows="5" placeholder="Riassunto"> {{old("excerpt")}} </textarea>
            </div>

            <div class="form-group">
                <label for="published">Pubblicato</label>
                <input style="width:auto" type="checkbox" class="form-control" id="published" name="published" value="1" {{old("published") == 1 ? "checked" : "" }}>
            </div>

            <div class="form-group">
                <label for="user">User</label>
                <select name="user_id" id="user" class="form-control">
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old("user_id") == $user->id ? 'selected' : '' }} > {{ $user->name }} </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

@endsection