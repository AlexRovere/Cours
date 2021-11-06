@extends('layouts.app')

@section('content')

<p>Article {{ $post->id }}</p>
<div class="my-5 border-2">
    <h1><a href="{{ route('posts.show', ['id' => $post->id] )}}">{{ $post['title'] }}</a></h1>
    <p>{{ $post['content'] }}</p>
    <span>Crée le : {{ $post['created_at'] }}</span>
</div>

@endsection