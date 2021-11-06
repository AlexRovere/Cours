@extends('layouts.app')

@section('content')

<h1>Détail de l'article</h1>

<div>
    @forelse($post->tags as $tag)
    <span class="border-2 bg-red-200">{{ $tag->name }}</span>
    @empty
    <span>Aucune catégorie associé</span>
    @endforelse
</div>

<span>{{ $post->image ? $post->image->path : 'Aucune image associé'}}</span>

<p>Article {{ $post->id }}</p>

<div class="my-5 border-2">
    <h1><a href="{{ route('posts.show', ['id' => $post->id] )}}">{{ $post['title'] }}</a></h1>
    <p>{{ $post['content'] }}</p>
    <span>Crée le : {{ $post['created_at'] }}</span>
</div>

<hr>

@forelse ($post->comments as $comment)
<div>{{ $comment->content }} | <span>Crée le : {{ $comment->created_at->format('d / m / Y') }}</span></div>

@empty

<span>Aucun commentaire pour cet article</span>

@endforelse

@endsection