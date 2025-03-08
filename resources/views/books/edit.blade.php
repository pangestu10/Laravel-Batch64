@extends('layout.master')
@section('title')
    Edit Books
@endsection
@section('content')
<form action="/books/{{$books->id}}" method="POST" enctype='multipart/form-data'>
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
        <label class="form-label">Genre</label>
        <select name="genres_id" id="" class='form-control'>
            <option value="">--Pilih Genre--</option>
            @forelse ($genres as $item)
                @if ($item->id===$books->genres_id)
                    
                <option value="{{$item->id}}" selected>{{$item->name}}</option>
                @else
                <option value="{{$item->id}}">{{$item->name}}</option>
                    
                @endif
            

            @empty
                <option value="">Genre belum ada</option>


            @endforelse
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Book Title</label>
        <input type="text" class="form-control" value='{{$books->title}}' name='title' >
    </div>
    <div class="mb-3">
        <label class="form-label">Summary</label>
        <textarea name="summary" id="" class='form-control' cols='30' rows='10'>{{$books->summary}}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" name='image' class="form-control" >
    </div>
    <div class="mb-3">
        <label class="form-label">Stock Book</label>
        <input type="number" name='stock' class="form-control" >
    </div>
   
    <button type='submit' class='btn btn-primary'>Submit</button>
</form>
@endsection