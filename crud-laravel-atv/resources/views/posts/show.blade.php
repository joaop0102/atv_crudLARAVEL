@extends('layouts.app')

@section('content')
<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 2rem;
        color: #333;
        margin-bottom: 20px;
    }

    p {
        font-size: 1rem;
        color: #555;
        line-height: 1.5;
        margin-bottom: 10px;
    }

    strong {
        color: #333;
    }

    .btn-secondary {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 15px;
        font-size: 1rem;
        border-radius: 4px;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s;
    }

    .btn-secondary:hover {
        background-color: #1E90FF;
    }
</style>

<div class="container">
    <h1>Detalhes do post</h1>
    @if($post)
    <p><strong>Título:</strong> {{ $post->title }}</p>
    <p><strong>Campo de texto:</strong> {{ $post->body }}</p>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Voltar</a>
    @else
    <p>Post not found</p>
    @endif
</div>
@endsection
