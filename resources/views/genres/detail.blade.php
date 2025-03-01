@extends('layout.master')
@section('title')
    Detail Genres
@endsection
@section('content')

    <h1>{{$genres->name}}</h1>
    <p>{{$genres->description}}</p>

    <a href="/genres" class='btn btn-secondary btn-sm'>Kembali</a>


@endsection