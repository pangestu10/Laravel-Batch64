@extends('layout.master')
@section('title')
    Tampil Genres
@endsection
@section('content')
<a href="/genres/create" class='btn btn-primary btn-sm my-2'>Tambah</a>

<table class='table'>
    <thead>
        <tr>
            <th scope='col'>#</th>
            <th scope='col'>Name</th>
            <th scope='col'>Acton</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($genres as $item)
        <tr>
            <th scop='row'>{{$loop->iteration}}</th>
            <td>{{$item->name}}</td>
            <td>
                <a href="/genres/{{$item->id}}" class='btn btn-info btn-sm'>Detail</a>
                <form action="/genres/{{$item->id}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="delete" class="btn btn-danger btn-sm">
                </form>
                <a href="/genres/{{$item->id}}/edit" class='btn btn-warning btn-sm'>Edit</a>
            </td>
        </tr>
        @empty
            <p>No User</p>
        @endforelse
    </tbody>
</table>

@endsection