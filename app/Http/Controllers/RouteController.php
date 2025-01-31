<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rute;
use App\Http\Controllers\DB;

class RouteController extends Controller
{

    public function index() {
        $rutes = Rute::all();
        return view('admin.rute', [
            'title' => 'Rute',
            
        ], compact('rutes'));
    }

    public function create(Request $request) {
        
        $dataKota = $request->validate([
            'nama_kota' => 'required|max:255',
            'desc' => 'required|max:255',
        
        // Rute::create([
        //     'nama_kota' => $request->nama_kota,
        //     'desc' => $request->desc
        // ]);
        
        ]);

        Rute::create($dataKota);
        // dd($request->all());
        // dd('register berhasil!!!');

        return redirect('/admin/rute')->with('success', 'Kota berhasil ditambah');
    }

    // public function edit(Request $request, string $id) {
        
    // }

    // public function update(Request $request, string $id) {
        
    //     $dataKota = $request->validate([
    //         'nama_kota' => 'required|max:255',
    //         'desc' => 'required|max:255',
        
    //     ]);

    //     Rute::find($id)->update($dataKota);
    //     // dd($request->all());
    //     // dd('register berhasil!!!');

    //     return redirect('/rute')->with('success', 'Kota berhasil ditambah');
    // } 

    // public $ruteId;
    
    // public function delete($id) {
    //     // Rute::destroy($rute->id);
    //     // $rute = Rute::where('id', $id)->delete();
    //     Rute::find($id)->delete();
    //     return redirect('/rute')->with('success', 'Kota berhasil dihapus');
        

    // }
}
