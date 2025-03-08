<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Middleware\IsAdmin;
use App\Models\genres;

class GenresController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(['auth',IsAdmin::class], except: ['index','show']),
        ];
    }
    public function create()
    {
        return view('genres.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        DB::table('genres')->insert([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);

        return redirect('/genres');
    }

    public function index()
    {
        $genres = DB::table('genres')->get();
 
        return view('genres.tampil', ['genres' => $genres]);
    }

    public function show($id)
    {
        $genres=genres::find($id);
        return view('genres.detail',['genres'=>$genres]);
    }


    public function edit($id)
    {
        $genres=DB::table('genres')->find($id);
        return view('genres.edit',['genres'=>$genres]);
    }

    public function update($id, request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);

        DB::table('genres')
            ->where('id', $id)
            ->update(
                [
                    'name'=>$request->input('name'),
                    'description'=>$request->input('description'),
                    'updated_at'=> Carbon::now(),
                ]
            );

        return redirect('/genres');
            
        
    }

    public function destroy($id){
        DB::table('genres')->where('id',$id)->delete();

        return redirect('/genres');
    }


   
}
