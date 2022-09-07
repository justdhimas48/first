<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\KategoriUnitKerja; 
use Response;

class KategoriUnitKerjaController extends Controller
{
    public function index(){
        $kategoriUnitKerja = KategoriUnitKerja::paginate(10);
        return view('admin.kategori-unit-kerja.index', compact('kategoriUnitKerja'));
    }

    public function store(Request $request) 
    { 
        $this->validate($request, [ 
            'nama' => 'required', 
        ]);

        $kategoriUnitKerja = new KategoriUnitKerja();
        $kategoriUnitKerja->nama = $request->nama;
        $kategoriUnitKerja->is_actived = 1;
        $kategoriUnitKerja->save();

        return redirect()->route("admin.kategori-unit-kerja.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    } 

    public function active($id){
        $kategoriUnitKerja = KategoriUnitKerja::where('id', $id)->first();
        $kategoriUnitKerja->is_actived = !$kategoriUnitKerja->is_actived;
		return Response::json($kategoriUnitKerja->save());
    }

    public function edit($id)
    {
        $kategoriUnitKerja = KategoriUnitKerja::where('id', $id)->first();
		return Response::json($kategoriUnitKerja);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'id' => 'required',
        ]);

        $kategoriUnitKerja = KategoriUnitKerja::where('id', $request->id)->first();
        $kategoriUnitKerja->nama = $request->nama;
        $kategoriUnitKerja->save();

        return redirect()->route("admin.kategori-unit-kerja.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        );
    }
}
