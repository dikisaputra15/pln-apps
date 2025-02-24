<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRealkpiRequest;
use Illuminate\Http\Request;
use App\Models\Realkpi;
use App\Exports\RealisasiKPIExport;
use App\Imports\RealisasiKPIImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class RealkpiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $unitinduks = DB::table('unitinduks')->get();

        $indikators = DB::table('realkpis')
        ->join('kpis', 'kpis.id', '=', 'realkpis.id_indikator_kpi')
        ->join('unitinduks', 'unitinduks.id', '=', 'realkpis.id_unit_induk')
        ->join('unitpelaksanas', 'unitpelaksanas.id', '=', 'realkpis.id_pelaksana')
        ->join('unitlayanans', 'unitlayanans.id', '=', 'realkpis.id_layanan')
        ->select('realkpis.*', 'kpis.indikator_kinerja', 'kpis.jenis_indikator', 'kpis.bobot', 'kpis.polaritas', 'kpis.tahun', 'unitinduks.nama_unit_induk', 'unitpelaksanas.nama_unit_pelaksana', 'unitlayanans.nama_unit_layanan_bagian')
        ->when($request->input('name'), function($query, $name){
            return $query->where('kpis.indikator_kinerja', 'like', '%'.$name.'%');
        })
        ->orderBy('realkpis.id', 'desc')
        ->paginate(10);

        return view('pages.realkpis.index', compact('indikators','unitinduks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $indikators = DB::table('kpis')->get();
        return view('pages.realkpis.create', compact('indikators'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRealkpiRequest $request)
    {
         $fpencapaian = ($request->realisasi/$request->target)*100;
        $fnilai = ($fpencapaian*$request->bobot)/100;

        $pencapaian = number_format($fpencapaian, 2, '.', '');
        $nilai = number_format($fnilai, 2, '.', '');

        if($request->realisasi == 0){
            $status = 'belum';
        }else if($pencapaian >= 100){
            $status = 'baik';
        }else if($pencapaian >= 95){
            $status = 'hati-hati';
        }else{
            $status = 'masalah';
        }

        Realkpi::create([
            'id_indikator_kpi' => $request->id_indikator_kpi,
            'bobot' => $request->bobot,
            'polaritas' => $request->polaritas,
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'target' => $request->target,
            'realisasi' => $request->realisasi,
            'pencapaian' => $pencapaian,
            'nilai' => $nilai,
            'status' => $status,
            'penjelasan' => $request->penjelasan
        ]);

        return redirect()->route('realkpi.index')->with('success', 'Data successfully created');
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
        $indikators = DB::table('kpis')->get();
        $realkpi = \App\Models\Realkpi::findOrFail($id);
        return view('pages.realkpis.edit', compact('indikators','realkpi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $fpencapaian = ($request->realisasi/$request->target)*100;
        $fnilai = ($fpencapaian*$request->bobot)/100;

        $pencapaian = number_format($fpencapaian, 2, '.', '');
        $nilai = number_format($fnilai, 2, '.', '');

        if($request->realisasi == 0){
            $status = 'belum';
        }else if($pencapaian >= 100){
            $status = 'baik';
        }else if($pencapaian >= 95){
            $status = 'hati-hati';
        }else{
            $status = 'masalah';
        }

        DB::table('realkpis')->where('id',$id)->update([
            'id_indikator_kpi' => $request->id_indikator_kpi,
            'bobot' => $request->bobot,
            'polaritas' => $request->polaritas,
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'target' => $request->target,
            'realisasi' => $request->realisasi,
            'pencapaian' => $pencapaian,
            'nilai' => $nilai,
            'status' => $status,
            'penjelasan' => $request->penjelasan
		]);

        return redirect()->route('realkpi.index')->with('success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Realkpi $realkpi)
    {
        $realkpi->delete();
        return redirect()->route('realkpi.index')->with('success', 'Data ßsuccessfully deleted');
    }

    public function filter(Request $request)
    {
        $unitinduks = DB::table('unitinduks')->get();
        $query = DB::table('realkpis')
        ->join('kpis', 'kpis.id', '=', 'realkpis.id_indikator_kpi')
        ->select('realkpis.*', 'kpis.indikator_kinerja', 'kpis.tahun', 'kpis.bobot', 'kpis.polaritas');

        // Filter berdasarkan Unit Induk
        if ($request->filled('id_unit_induk')) {
            $query->where('realkpis.id_unit_induk', $request->id_unit_induk);
        }

        // Filter berdasarkan Unit Pelaksana
        if ($request->filled('id_pelaksana')) {
            $query->where('realkpis.id_pelaksana', $request->id_pelaksana);
        }

        // Filter berdasarkan Unit Layanan
        if ($request->filled('id_layanan')) {
            $query->where('realkpis.id_layanan', $request->id_layanan);
        }

        // Filter berdasarkan Bulan
        if ($request->filled('bulan')) {
            $query->where('realkpis.bulan', $request->bulan);
        }

        // Filter berdasarkan Tahun
        if ($request->filled('tahun')) {
            $query->where('kpis.tahun', $request->tahun);
        }

        // Eksekusi query
        $indikators = $query->get();

        return view('pages.realkpis.filter', compact('indikators','unitinduks'));

    }

    public function export()
    {
        return Excel::download(new RealisasiKPIExport, 'realisasi_kpi.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new RealisasiKPIImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data berhasil diimport dan diperbarui!');
    }

}
