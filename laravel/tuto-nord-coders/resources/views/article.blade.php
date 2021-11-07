@extends('layouts.app')

@section('content')

<h1 class="text-center text-2xl font-bold">Détail de l'article</h1>

<div>
    @forelse($post->tags as $tag)
    <span class="border-2 bg-red-200">{{ $tag->name }}</span>
    @empty
    <span>Aucune catégorie associé</span>
    @endforelse
</div>

<div>
    <span>url image : {{ $post->image ? $post->image->path : 'Aucune image associé'}}</span>
</div>
<div>
    <span>nom de l'artiste : {{ $post->imageArtist->name ?? 'Aucune artiste associé' }}</span>
</div>

<p>Article {{ $post->id }}</p>

<div class="my-5 border-2">
    <h1><a href="{{ route('posts.show', ['id' => $post->id] )}}">{{ $post['title'] }}</a></h1>
    <p>{{ $post['content'] }}</p>
    <span>Crée le : {{ $post['created_at'] }}</span>
</div>

<hr>


{{-- <div>Commentaire le plus récent : {{ $post->latestComment->content ?? 'aucun commentaire'}}</div> --}}


@forelse ($post->comments as $comment)
<div>{{ $comment->content }} | <span>Crée le : {{ $comment->created_at->format('d / m / Y') }}</span></div>

@empty

<span>Aucun commentaire pour cet article</span>

@endforelse

@endsection