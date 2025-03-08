@extends('layout.master')
@section('title')
    Tambah Genres
@endsection
@section('content')

<img src="{{asset('image/' .$books->image)}}" alt="">
<h1 class='text-primary'>{{$books->title}}</h1>
<p>{{$books->summary}}</p>

@endsection