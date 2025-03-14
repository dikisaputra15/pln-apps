<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRealkpiRequest;
use Illuminate\Http\Request;
use App\Models\Realkpi;
use App\Models\Kpi;
use App\Models\Subkpi;
use App\Exports\RealisasiKPIExport;
use App\Imports\RealisasiKPIImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class RealkpiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $default = 1;
        $unitinduks = DB::table('unitinduks')->get();
        $currentmonth = Carbon::now()->format('m');
        $currentyear = Carbon::now()->format('Y');

        // $query = DB::table('realkpis')
        // ->join('kpis', 'kpis.id', '=', 'realkpis.id_indikator_kpi')
        // ->join('unitinduks', 'unitinduks.id', '=', 'realkpis.id_unit_induk')
        // ->join('unitpelaksanas', 'unitpelaksanas.id', '=', 'realkpis.id_pelaksana')
        // ->join('unitlayanans', 'unitlayanans.id', '=', 'realkpis.id_layanan')
        // ->select('realkpis.*', 'kpis.indikator_kinerja', 'kpis.tahun', 'kpis.bobot', 'kpis.polaritas', 'unitinduks.nama_unit_induk', 'unitpelaksanas.nama_unit_pelaksana', 'unitlayanans.nama_unit_layanan_bagian')
        // ->where('realkpis.id_unit_induk', 1)
        // ->where('realkpis.id_pelaksana', 1)
        // ->where('realkpis.id_layanan', 1)
        // ->where('realkpis.bulan', $currentmonth)
        // ->where('kpis.tahun', $currentyear);
        // $indikators = $query->get();

        $data = DB::table('kpis')
                    ->leftJoin('subkpis', 'kpis.id', '=', 'subkpis.id_kpi')
                    ->leftJoin('realkpis as realkpi', function ($join) {
                        $join->on('kpis.id', '=', 'realkpi.id_indikator_kpi');
                        // Jangan ikutkan kondisi sub_kpi agar KPI utama tetap muncul
                    })
                ->select(
                    'realkpi.*',
                    'kpis.id as kpi_id',
                    'kpis.indikator_kinerja',
                    'kpis.jenis_indikator',
                    'kpis.bobot',
                    'kpis.polaritas',
                    'kpis.tahun',
                    'subkpis.id as sub_kpi_id',
                    'subkpis.nama_sub_kpi'
                )
                ->where('realkpi.id_unit_induk', 1)
                ->where('realkpi.id_pelaksana', 1)
                ->where('realkpi.id_layanan', 1)
                ->where('realkpi.bulan', $currentmonth)
                ->where('kpis.tahun', $currentyear)
                ->orderBy('kpis.id')
                ->orderBy('subkpis.id')
                ->get();

        return view('pages.realkpis.index', compact('data','unitinduks','default','currentmonth'));
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
        $default = 1;
        $unitinduks = DB::table('unitinduks')->get();
        $currentmonth = Carbon::now()->format('m');
        $query = DB::table('realkpis')
        ->join('kpis', 'kpis.id', '=', 'realkpis.id_indikator_kpi')
        ->join('unitinduks', 'unitinduks.id', '=', 'realkpis.id_unit_induk')
        ->join('unitpelaksanas', 'unitpelaksanas.id', '=', 'realkpis.id_pelaksana')
        ->join('unitlayanans', 'unitlayanans.id', '=', 'realkpis.id_layanan')
        ->select('realkpis.*', 'kpis.indikator_kinerja', 'kpis.tahun', 'kpis.bobot', 'kpis.polaritas', 'unitinduks.nama_unit_induk', 'unitpelaksanas.nama_unit_pelaksana', 'unitlayanans.nama_unit_layanan_bagian');

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

        return view('pages.realkpis.filter', compact('indikators','unitinduks','default','currentmonth'));

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
