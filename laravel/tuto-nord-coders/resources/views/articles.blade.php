@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="bg-green-500">
    {{ session('status') }}
</div>
@endif

@if ($posts->count() > 0)
@foreach($posts as $post)
<p>Article {{ $post->id }}</p>
<div class="my-5 border-2">
    <h3><a href="{{ route('posts.show', ['id' => $post->id] )}}">{{ $post['title'] }}</a></h3>
    <p>{{ $post['content'] }}</p>
    <span>Crée le : {{ $post['created_at'] }}</span>
    <a class="border-2 bg-green-500" href="{{ route('posts.update', ['id' => $post->id] )}}">Modifier le post</a>
    <a class="border-2 bg-red-500" href="{{ route('posts.delete', ['id' => $post->id] )}}">Supprimer le post</a>
</div>
@endforeach
@else
<span>Aucun article en base de données</span>
@endif

@endsection