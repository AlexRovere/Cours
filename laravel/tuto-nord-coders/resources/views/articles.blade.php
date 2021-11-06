@extends('layouts.app')

@section('content')
@foreach($posts as $post)
<h3><a href="#">{{$post}}</a></h3>
@endforeach
@endsection