@extends('layouts.main')

@section('page-content')
    <div class="container">
        <h1>Modifica Post: {{$post->title}}</h1>

        <form action="{{ route("posts.update", $post->id) }}" method="post">
            @csrf
            @method("PUT")

            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Titolo" value="{{old("title") ? old("title") : $post->title }}">
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{old("slug") ? old("slug") : $post->slug}}">
            </div>

            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="Contenuto"> {{old("content") ? old("content") : $post->content }} </textarea>
            </div>

            <div class="form-group">
                <label for="excerpt">Riassunto</label>
                <textarea class="form-control" name="excerpt" id="excerpt" cols="30" rows="5" placeholder="Riassunto"> {{old("excerpt") ? old("excerpt") :  $post->excerpt}} </textarea>
            </div>

            <div class="form-group">
                <label for="published">Pubblicato</label>
                @php
                    $checked = old("published") !== null ? old("published") : $post->published;
                @endphp
                    <input style="width:auto" type="checkbox" class="form-control" id="published" name="published" value="1" {{$checked == 1 ? "checked" : "" }}>                                 
            </div>

            <div class="form-group">
                <label for="user">User</label>
                <select name="user_id" id="user" class="form-control">
                    @php
                        $selected = old("user_id") ? old("user_id") : $post->user_id;
                    @endphp

                    @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $selected == $user->id ? 'selected' : '' }} > {{ $user->name }} </option>
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