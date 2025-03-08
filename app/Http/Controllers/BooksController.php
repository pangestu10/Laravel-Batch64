<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\genres;
use App\Models\books;
use File;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Middleware\IsAdmin;

class BooksController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(['auth', IsAdmin::class], except: ['index','show']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {                                                                                                       
        $books=books::all();
        return view('books.tampil', ['books'=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres=genres::all();
        return view('books.tambah',['genres'=>$genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'title'=>'required',
            'summary'=>'required',
            'stock'=>'required',
            'genres_id'=>'required',
        ]);

        $newImageName = time().'.'.$request->image->extension();  
           
        $request->image->move(public_path('image'), $newImageName);

        $books = new books;
 
        $books->title = $request->input('title');
        $books->summary = $request->input('summary');
        $books->image = $newImageName;
        $books->stock = $request->input('stock');
        $books->genres_id = $request->input('genres_id');
 
        $books->save();
 
        return redirect('/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books=books::find($id);
        return view('books.detail',['books'=>$books]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genres=genres::all();
        $books=books::find($id);

        return view('books.edit', ['books'=>$books, 'genres'=>$genres]);    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image'=>'mimes:jpeg,png,jpg,svg|max:2048',
            'title'=>'required',
            'summary'=>'required',
            'stock'=>'required',
            'genres_id'=>'required',
        ]);
        $books= books::find($id);

        if($request->has('image')){
            // hapus data
            File::delete('image/'. $books->image);

            $newImageName = time().'.'.$request->image->extension();  
           
            $request->image->move(public_path('image'), $newImageName);

            $books->image=  $newImageName ;


        }

        $books->title=$request->input('title');
        $books->summary=$request->input('summary');
        $books->stock=$request->input('stock');
        $books->genres_id=$request->input('genres_id');

        $books->save();

        return redirect("/books");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books=books::find($id);
        File::delete('image/'. $books->image);

        $books->delete();

        return redirect('/books');
    }
}
