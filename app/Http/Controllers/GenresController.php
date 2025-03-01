<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GenresController extends Controller
{
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
        $genres=DB::table('genres')->find($id);
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
