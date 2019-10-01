<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelajarController extends Controller
{
    public function index(){

        /* return view('pelajar.index'); */

        $data_pelajar = \App\Pelajar::all();
        return view('pelajar.index', ['data_pelajar' => $data_pelajar]);
    }

    public function create(Request $request){
        \App\Pelajar::create($request->all());
        return redirect('/pelajar')->with('done', 'Maklumat Berjaya Dihantar');
    }

    public function edit($id){
        $pelajar = \App\Pelajar::find($id);
        return view('pelajar.edit', ['pelajar' => $pelajar]);
    }

    public function update(Request $request, $id){
        $pelajar = \App\Pelajar::find($id);
        $pelajar->update($request->all());
        return redirect('/pelajar')->with('done', 'Maklumat Berjaya Diubah');

    }

    public function delete($id){
        $pelajar = \App\Pelajar::find($id);
        $pelajar->delete($id);
        return redirect('/pelajar')->with('done', 'Maklumat Berjaya Dibuang');
    }
}
