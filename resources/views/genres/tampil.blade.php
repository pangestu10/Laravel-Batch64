@extends('layout.master')
@section('title')
    Tampil Genres
@endsection
@section('content')
@auth
    @if(Auth()->user()->role === 'admin') 
        <a href="/genres/create" class='btn btn-primary btn-sm my-2'>Tambah</a>
    @endif
@endauth

<table class='table'>
    <thead>
        <tr>
            <th scope='col'>#</th>
            <th scope='col'>Name</th>
            <th scope='col'>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($genres as $item)
        <tr>
            <th scope='row'>{{$loop->iteration}}</th>
            <td>{{$item->name}}</td>
            <td class="d-flex gap-1">
                <a href="/genres/{{$item->id}}" class='btn btn-info btn-sm'>Detail</a>
                @auth
                    @if(Auth()->user()->role === 'admin') 
                        <a href="/genres/{{$item->id}}/edit" class='btn btn-warning btn-sm'>Edit</a>
                        <form action="/genres/{{$item->id}}" method="POST" class="d-inline">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    @endif
                @endauth
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">No Genres Found</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection