@extends('layout.master')
@section('title')
    Buat Profile
@endsection
@section('content')
    <form action="/profile" method="POST">
        @csrf
    
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
            <label class="form-label">Age</label>
            <input type="number" class="form-control" name='age' >
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="address" id="" class='form-control' cols='30' rows='10'></textarea>
        </div>
        <button type='submit' class='btn btn-primary'>Submit</button>
    </form>
@endsection