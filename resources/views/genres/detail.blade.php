@extends('layout.master')
@section('title')
    Detail Genres
@endsection
@section('content')
    <div class="container">
        @if($genres)
            <h1>{{$genres->name}}</h1>
            <p>{{$genres->description}}</p>

            <div class="row">
                @if($genres->books && count($genres->books) > 0)
                    @foreach($genres->books as $item)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img src="{{asset('image/' .$item->image)}}" class="card-img-top" height="300px" alt="{{$item->title}}">
                                <div class="card-body">
                                    <h5 class="card-title">{{$item->title}}</h5>
                                    <p class="card-text">{{Str::limit($item->summary, 100)}}</p>
                                    <div class="d-grid gap-2">
                                        <a href="/books/{{$item->id}}" class="btn btn-info">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="alert alert-info">
                            Tidak ada buku dalam genre ini.
                        </div>
                    </div>
                @endif
            </div>
        @else
            <div class="alert alert-danger">
                Genre tidak ditemukan.
            </div>
        @endif

        <div class="mt-3">
            <a href="/genres" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection