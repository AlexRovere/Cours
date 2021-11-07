@extends('layouts.app')

@section('content')
<h1>Créer votre post</h1>

@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="text-red-500">{{ $error }}</div>
@endforeach
@endif

<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
    {{-- Génére un tokken csrf --}}
    @csrf
    <input type="text" name="title" class="border-gray-600 border-2">
    <textarea class="border-gray-600 border-2" name="content"></textarea>

    <p>Choose your monster's features:</p>

    <div>
        <input type="checkbox" id="scales" name="scales" checked>
        <label for="scales">Scales</label>
    </div>

    <div>
        <input type="checkbox" id="horns" name="horns">
        <label for="horns">Horns</label>
    </div>

    <label for="avatar">Choose a profile picture:</label>

    <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">


    <button class="bg-green-500" type="submit">Créer</button>
</form>
@endsection