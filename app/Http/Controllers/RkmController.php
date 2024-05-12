<?php

namespace App\Http\Controllers;

use App\Models\Rkm;
use App\Models\Indikatorkinerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rkms = DB::table('rkms')
        ->join('unitinduks', 'unitinduks.id', '=', 'rkms.id_unit_induk')
        ->join('unitpelaksanas', 'unitpelaksanas.id', '=', 'rkms.id_pelaksana')
        ->join('unitlayanans', 'unitlayanans.id', '=', 'rkms.id_layanan')
        ->join('aspirasis', 'aspirasis.id', '=', 'rkms.id_aspirasi')
        ->join('indikatorkinerjas', 'indikatorkinerjas.id', '=', 'rkms.id_indikator')
        ->join('satuans', 'satuans.id', '=', 'rkms.id_satuan')
        ->select('rkms.*', 'unitinduks.nama_unit_induk', 'unitpelaksanas.nama_unit_pelaksana', 'unitlayanans.nama_unit_layanan_bagian', 'kategoris.nama_kategori', 'aspirasis.nama_aspirasi', 'indikatorkinerjas.indikator_kinerja', 'satuans.nama_satuan')
        ->when($request->input('name'), function($query, $name){
            return $query->where('nama_indikator_rkm', 'like', '%'.$name.'%');
        })
        ->orderBy('rkms.id', 'desc')
        ->paginate(10);
        return view('pages.rkms.index', compact('rkms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unitinduks = DB::table('unitinduks')->get();
        $indikators = DB::table('indikators')->get();
        return view('pages.rkms.create', compact('unitinduks','indikators'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_indikator = $request->id_indikator;
        $indikator = Indikator::find($id_indikator);

        Rkm::create([
            'id_unit_induk' => $request->id_unit_induk,
            'id_pelaksana' => $request->id_pelaksana,
            'id_layanan' => $request->id_layanan,
            'id_kategori' => $indikator->id_kategori,
            'id_aspirasi' => $indikator->id_aspirasi,
            'id_indikator' => $request->id_indikator,
            'id_satuan' => $indikator->id_satuan,
            'bobot' => $indikator->bobot,
            'polaritas' => $indikator->polaritas,
            'nama_indikator_rkm' => $request->nama_indikator_rkm,
            'polaritas_rkm' => $request->polaritas_rkm,
            'satuan_rkm' => $request->satuan_rkm
        ]);

        return redirect()->route('rkm.index')->with('success', 'Data successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $unitinduks = DB::table('unitinduks')->get();
        $unitpelaksanas = DB::table('unitpelaksanas')->get();
        $unitlayanans = DB::table('unitlayanans')->get();
        $indikators = DB::table('indikators')->get();
        $rkm = \App\Models\Rkm::findOrFail($id);
        return view('pages.rkms.edit', compact('unitinduks','unitpelaksanas','unitlayanans','indikators','rkm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $id_indikator = $request->id_indikator;
        $indikator = Indikator::find($id_indikator);

        DB::table('rkms')->where('id',$id)->update([
			'id_unit_induk' => $request->id_unit_induk,
			'id_pelaksana' => $request->id_pelaksana,
            'id_layanan' => $request->id_layanan,
            'id_kategori' => $indikator->id_kategori,
            'id_aspirasi' => $indikator->id_aspirasi,
            'id_indikator' => $request->id_indikator,
            'id_satuan' => $indikator->id_satuan,
            'bobot' => $indikator->bobot,
            'polaritas' => $indikator->polaritas,
            'nama_indikator_rkm' => $request->nama_indikator_rkm,
            'polaritas_rkm' => $request->polaritas_rkm,
            'satuan_rkm' => $request->satuan_rkm
		]);
        return redirect()->route('rkm.index')->with('success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rkm $rkm)
    {
        $rkm->delete();
        return redirect()->route('rkm.index')->with('success', 'Data ßsuccessfully deleted');
    }
}
