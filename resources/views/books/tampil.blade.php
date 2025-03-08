@extends('layout.master')
@section('title')
    Sanber Book
@endsection
@section('content')
@auth
    @if(Auth()->user()->role === 'admin') 
        <a href="/books/create" class='btn btn-primary my-3'>Tambah</a>
    @endif
@endauth
<div class="row">
    @forelse ($books as $item)
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('image/' .$item->image)}}" class="card-img-top" height='300px' alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$item->title}}</h5>
                    <p class="card-text">{{Str::limit($item->summary)}}</p>
                    <div class="d-grid gap-2">
                        <a href="/books/{{$item->id}}" class="btn btn-info">Read More</a>
                    </div>
                    @auth
                        @if(Auth()->user()->role === 'admin') 
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="d-grid gap-2">
                                        <a href="/books/{{$item->id}}/edit" class="btn btn-warning">Edit</a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-grid gap-2">
                                        <form action="/books/{{ $item->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger w-100">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    @empty
        <h1>Belum ada buku</h1>
    @endforelse
</div>

@endsection