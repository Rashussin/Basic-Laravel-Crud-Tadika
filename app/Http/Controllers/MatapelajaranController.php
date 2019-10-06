<?php

namespace App\Http\Controllers;
use \App\Matapelajaran;
use Illuminate\Http\Request;

class MatapelajaranController extends Controller
{
    public function index(){
        $matapelajaran = Matapelajaran::all();
        return view('matapelajaran.index', array('matapelajaran' => $matapelajaran));
    }

    public function matapelajaranjson(){
        $matapelajarans = Matapelajaran::all();
        return response()->json(['matapelajarans'=>$matapelajarans]);
    }

    public function deleteDataMatapelajaran(Request $request){
        $matapelajaran = Matapelajaran::where('id','=',$request->get('id'))->delete();
        return response()->json();
    }
}
