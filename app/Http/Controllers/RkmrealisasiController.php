<?php

namespace App\Http\Controllers;

use App\Models\Rkmrealisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RkmrealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rkmrealisasis = DB::table('rkmrealisasis')
        ->join('rkms', 'rkms.id', '=', 'rkmrealisasis.id_rkm')
        ->join('rekaprkms', 'rekaprkms.id', '=', 'rkmrealisasis.id_rekap_rkm')
        ->select('rkmrealisasis.*', 'rkms.nama_indikator_rkm', 'rekaprkms.mitigasi')
        ->when($request->input('name'), function($query, $name){
            return $query->where('kendala', 'like', '%'.$name.'%');
        })
        ->orderBy('rkmrealisasis.id', 'desc')
        ->paginate(10);
        return view('pages.realisasirkms.index', compact('rkmrealisasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rkms = DB::table('rkms')->get();
        $rekaprkms = DB::table('rekaprkms')->get();
        return view('pages.realisasirkms.create', compact('rkms','rekaprkms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Rkmrealisasi::create([
            'id_rekap_rkm' => $request->id_rekaprkm,
            'id_rkm' => $request->id_rkm,
            'id_p' => $request->id_p,
            'tanggal' => $request->tanggal,
            'alamat' => $request->alamat,
            'daya' => $request->daya,
            'satuan_hasil' => $request->satuan_hasil,
            'estimasi_hasil' => $request->estimasi_hasil
        ]);

        return redirect()->route('rkmrealisasi.index')->with('success', 'Data successfully created');
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
        $rekaprkms = DB::table('rekaprkms')->get();
        $rkms = DB::table('rkms')->get();
        $rkmrealisasi = \App\Models\Rkmrealisasi::findOrFail($id);
        return view('pages.realisasirkms.edit', compact('rekaprkms','rkms','rkmrealisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::table('rkmrealisasis')->where('id',$id)->update([
			'id_rekap_rkm' => $request->id_rekap_rkm,
            'id_rkm' => $request->id_rkm,
            'id_p' => $request->id_p,
            'tanggal' => $request->tanggal,
            'alamat' => $request->alamat,
            'daya' => $request->daya,
            'satuan_hasil' => $request->satuan_hasil,
            'estimasi_hasil' => $request->estimasi_hasil
		]);

        return redirect()->route('rkmrealisasi.index')->with('success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rkmrealisasi $rkmrealisasi)
    {
        $rkmrealisasi->delete();
        return redirect()->route('rkmrealisasi.index')->with('success', 'Data ßsuccessfully deleted');
    }
}
