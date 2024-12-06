@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}">Create New Post</a>
    
    <ul>
        @foreach ($posts as $post)
            <li>
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
                <p>Category: {{ $post->category->name }}</p>
                <p>Author: {{ $post->user->name }}</p>
                <!-- Добавить ссылки на редактирование и удаление -->
            </li>
        @endforeach
    </ul>
</div>
@endsection
