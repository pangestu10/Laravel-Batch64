@extends('layout.master')
@section('title')
    Edit Genres
@endsection
@section('content')
    <form action="/genres/{{$genres->id}}" method="POST">
        @csrf
        @method('PUT')
        <!-- validaation -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="mb-3">
            <label class="form-label">Genres Name</label>
            <input type="text" class="form-control" name='name' value='{{$genres->name}}' >
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" id="" class='form-control' cols='30' rows='10'>{{$genres->description}}</textarea>
        </div>
        <button type='submit' class='btn btn-primary'>Submit</button>
    </form>
@endsection