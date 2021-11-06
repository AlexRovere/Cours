@extends('layouts.app')

@section('content')
<h1>Créer votre post</h1>
<form method="POST" action="{{ route('posts.store') }}">
    {{-- Génére un tokken csrf --}}
    @csrf
    <input type="text" name="title" class="border-gray-600 border-2">
    <textarea class="border-gray-600 border-2" name="content"></textarea>
    <button class="bg-green-500" type="submit">Créer</button>
</form>
@endsection