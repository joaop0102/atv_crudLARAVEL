@extends('layouts.app')

@section('content')
<style>
  
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    h1 {
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #1d4ed8; /* Blue color */
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #1e40af; /* Darker blue color */
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table thead {
        background-color: #f3f4f6; /* Light gray */
    }

    .table th, .table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #e5e7eb; /* Gray border */
    }

    .table th {
        font-weight: 500;
        color: #6b7280; /* Gray color */
        text-transform: uppercase;
    }

    .table td {
        color: #374151; /* Dark gray color */
    }

    .table .btn-info {
        background-color: #3b82f6; /* Blue color */
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .table .btn-info:hover {
        background-color: #2563eb; /* Darker blue color */
    }

    .table .btn-warning {
        background-color: #f59e0b; 
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .table .btn-warning:hover {
        background-color: #d97706; 
    }

    .table .btn-danger {
        background-color: #ef4444; 
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .table .btn-danger:hover {
        background-color: #dc2626; 
    }

    .table form {
        display: inline;
    }

    .no-posts {
        text-align: center;
        padding: 20px;
        color: #6b7280; /* Gray color */
    }
</style>

<div class="container">
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Criar Post</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @if($posts->isNotEmpty())
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">Visualizar</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">No posts found</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
