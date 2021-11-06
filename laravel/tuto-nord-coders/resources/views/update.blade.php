@extends('layouts.app')

@section('content')
<h1>Modifier votre post</h1>
<form method="POST" action="{{ route('posts.storeUpdate') }}">
    {{-- Génére un tokken csrf --}}
    @csrf
    <input type="hidden" name="id" value="{{ $post->id }}">
    <input type="text" name="title" class="border-gray-600 border-2" value="{{ $post->title }}">
    <textarea class="border-gray-600 border-2" name="content">{{ $post->content }}</textarea>
    <button class="bg-green-500" type="submit">Modifier</button>
</form>
@endsection