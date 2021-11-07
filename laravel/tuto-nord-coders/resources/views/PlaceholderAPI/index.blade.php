@extends('layouts.app')

@section('content')

@foreach ($data as $post)
<h1>
    {{ $post['title']}}
</h1>
@endforeach

@endsection