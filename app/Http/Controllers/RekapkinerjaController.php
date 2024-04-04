<?php

namespace App\Http\Controllers;

use App\Models\Rekapkinerja;
use App\Models\Indikator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RekapkinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rekapkinerjas = DB::table('rekapkinerjas')
        ->join('unitinduks', 'unitinduks.id', '=', 'rekapkinerjas.id_unit_induk')
        ->join('unitpelaksanas', 'unitpelaksanas.id', '=', 'rekapkinerjas.id_pelaksana')
        ->join('unitlayanans', 'unitlayanans.id', '=', 'rekapkinerjas.id_layanan')
        ->join('aspirasis', 'aspirasis.id', '=', 'rekapkinerjas.id_aspirasi')
        ->join('indikators', 'indikators.id', '=', 'rekapkinerjas.id_indikator')
        ->select('rekapkinerjas.*', 'unitinduks.nama_unit_induk', 'unitpelaksanas.nama_unit_pelaksana', 'unitlayanans.nama_unit_layanan_bagian', 'aspirasis.nama_aspirasi', 'indikators.indikator_kinerja')
        ->when($request->input('name'), function($query, $name){
            return $query->where('tahun', 'like', '%'.$name.'%');
        })
        ->orderBy('rekapkinerjas.id', 'desc')
        ->paginate(10);
        return view('pages.rekapkinerjas.index', compact('rekapkinerjas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unitinduks = DB::table('unitinduks')->get();
        $indikators = DB::table('indikators')->get();
        return view('pages.rekapkinerjas.create', compact('unitinduks','indikators'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_indikator = $request->id_indikator;
        $indikator = Indikator::find($id_indikator);

        Rekapkinerja::create([
            'id_aspirasi' => $indikator->id_aspirasi,
            'id_indikator' => $request->id_indikator,
            'id_unit_induk' => $request->id_unit_induk,
            'id_pelaksana' => $request->id_pelaksana,
            'id_layanan' => $request->id_layanan,
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'target' => $request->target,
            'realisasi' => $request->realisasi,
            'pencapaian' => $request->pencapaian,
            'nilai' => $request->nilai,
            'status' => $request->status,
            'penjelasan' => $request->penjelasan
        ]);

        return redirect()->route('rekapkinerja.index')->with('success', 'Data successfully created');
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
        $rekapkinerja = \App\Models\Rekapkinerja::findOrFail($id);
        return view('pages.rekapkinerjas.edit', compact('unitinduks','unitpelaksanas','unitlayanans','indikators','rekapkinerja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $id_indikator = $request->id_indikator;
        $indikator = Indikator::find($id_indikator);

        DB::table('rekapkinerjas')->where('id',$id)->update([
            'id_aspirasi' => $indikator->id_aspirasi,
            'id_indikator' => $request->id_indikator,
            'id_unit_induk' => $request->id_unit_induk,
			'id_pelaksana' => $request->id_pelaksana,
            'id_layanan' => $request->id_layanan,
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'target' => $request->target,
            'realisasi' => $request->realisasi,
            'pencapaian' => $request->pencapaian,
            'nilai' => $request->nilai,
            'status' => $request->status,
            'penjelasan' => $request->penjelasan
		]);
        return redirect()->route('rekapkinerja.index')->with('success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rekapkinerja $rekapkinerja)
    {
        $rekapkinerja->delete();
        return redirect()->route('rekapkinerja.index')->with('success', 'Data ßsuccessfully deleted');
    }
}
