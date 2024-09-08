@extends('layouts.app')

@section('content')
<style>
    *{
        font-family: Georgia, serif;
    }
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    h1 {
        font-size: 2rem;
        color: #333;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-size: 1rem;
        color: #555;
        margin-bottom: 5px;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    textarea {
        resize: vertical;
    }

    button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 15px;
        font-size: 1rem;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #0056b3;
    }

    p {
        font-size: 1rem;
        color: #999;
    }
</style>

<div class="container">
    <h1>Editar Post</h1>
    @if($post)
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
        </div>
        <div class="form-group">
            <label for="body">Campo de texto</label>
            <textarea class="form-control" id="body" name="body" rows="5" required>{{ $post->body }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Confirmar</button>
    </form>
    @else
    <p>Post not found</p>
    @endif
</div>
@endsection
