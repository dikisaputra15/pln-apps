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

        $data = DB::table('kpis')
                ->leftJoin('realkpis as realkpi', 'kpis.id', '=', 'realkpi.id_indikator_kpi')
                ->leftJoin('unitinduks as ui', 'realkpi.id_unit_induk', '=', 'ui.id')
                ->leftJoin('unitpelaksanas as up', 'realkpi.id_pelaksana', '=', 'up.id')
                ->leftJoin('unitlayanans as ul', 'realkpi.id_layanan', '=', 'ul.id')
                ->select(
                    'realkpi.*',
                    'kpis.id as kpi_id',
                    'kpis.indikator_kinerja',
                    'kpis.jenis_indikator',
                    'kpis.bobot',
                    'kpis.polaritas',
                    'kpis.tahun',
                    'ui.nama_unit_induk as unit_induk',
                    'up.nama_unit_pelaksana as unit_pelaksana',
                    'ul.nama_unit_layanan_bagian as unit_layanan'
                )
                ->where('realkpi.id_unit_induk', 1)
                ->where('realkpi.id_pelaksana', 1)
                ->where('realkpi.id_layanan', 1)
                ->where('realkpi.bulan', $currentmonth)
                ->where('kpis.tahun', $currentyear)
                ->orderBy('kpis.jenis_indikator')
                ->orderBy('kpis.id')
                ->get()
                ->groupBy('jenis_indikator') // Kelompokkan berdasarkan jenis indikator
                ->map(function ($group) {
                    return $group->groupBy('kpi_id'); // Kelompokkan lagi berdasarkan KPI utama
                });

        $totalNilai = DB::table('kpis')
                ->leftJoin('realkpis as realkpi', 'kpis.id', '=', 'realkpi.id_indikator_kpi')
                ->leftJoin('unitinduks as ui', 'realkpi.id_unit_induk', '=', 'ui.id')
                ->leftJoin('unitpelaksanas as up', 'realkpi.id_pelaksana', '=', 'up.id')
                ->leftJoin('unitlayanans as ul', 'realkpi.id_layanan', '=', 'ul.id')
                ->select(
                    'realkpi.*',
                    'kpis.id as kpi_id',
                    'kpis.indikator_kinerja',
                    'kpis.jenis_indikator',
                    'kpis.bobot',
                    'kpis.polaritas',
                    'kpis.tahun',
                    'ui.nama_unit_induk as unit_induk',
                    'up.nama_unit_pelaksana as unit_pelaksana',
                    'ul.nama_unit_layanan_bagian as unit_layanan'
                )
                ->where('realkpi.id_unit_induk', 1)
                ->where('realkpi.id_pelaksana', 1)
                ->where('realkpi.id_layanan', 1)
                ->where('realkpi.bulan', $currentmonth)
                ->where('kpis.tahun', $currentyear)
                ->sum('realkpi.nilai');

        return view('pages.realkpis.index', compact('data','unitinduks','default','currentmonth', 'totalNilai'));
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

        $query = DB::table('kpis')
                ->leftJoin('realkpis as realkpi', 'kpis.id', '=', 'realkpi.id_indikator_kpi')
                ->leftJoin('unitinduks as ui', 'realkpi.id_unit_induk', '=', 'ui.id')
                ->leftJoin('unitpelaksanas as up', 'realkpi.id_pelaksana', '=', 'up.id')
                ->leftJoin('unitlayanans as ul', 'realkpi.id_layanan', '=', 'ul.id')
                ->select(
                    'realkpi.*',
                    'kpis.id as kpi_id',
                    'kpis.indikator_kinerja',
                    'kpis.jenis_indikator',
                    'kpis.bobot',
                    'kpis.polaritas',
                    'kpis.tahun',
                    'ui.nama_unit_induk as unit_induk',
                    'up.nama_unit_pelaksana as unit_pelaksana',
                    'ul.nama_unit_layanan_bagian as unit_layanan'
                );

         // ✅ Tambahkan Filter Sesuai Request
        if ($request->filled('id_unit_induk')) {
            $query->where('realkpi.id_unit_induk', $request->id_unit_induk);
        }

        if ($request->filled('id_pelaksana')) {
            $query->where('realkpi.id_pelaksana', $request->id_pelaksana);
        }

        if ($request->filled('id_layanan')) {
            $query->where('realkpi.id_layanan', $request->id_layanan);
        }

        if ($request->filled('bulan')) {
            $query->where('realkpi.bulan', $request->bulan);
        }

        if ($request->filled('tahun')) {
            $query->where('kpis.tahun', $request->tahun);
        }

        // Eksekusi query
        $data = $query->get()
        ->groupBy('jenis_indikator') // Grouping berdasarkan jenis_indikator
        ->map(function ($group) {
            return $group->groupBy('kpi_id'); // Kelompokkan lagi berdasarkan KPI utama
        });

        $totalNilai = 0;

        foreach ($data as $jenisGroup) {
            foreach ($jenisGroup as $kpiGroup) {
                foreach ($kpiGroup as $item) {
                    $totalNilai += $item->nilai;
                }
            }
        }

        return view('pages.realkpis.filter', compact('data','unitinduks','default','currentmonth', 'totalNilai'));

    }

    public function export(Request $request)
    {
        $id_unit_induk = $request->id_unit_induk;
        $id_pelaksana = $request->id_pelaksana;
        $id_layanan = $request->id_layanan;
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $query = DB::table('kpis')
            ->leftJoin('realkpis as realkpi', 'kpis.id', '=', 'realkpi.id_indikator_kpi')
            ->leftJoin('unitinduks as ui', 'realkpi.id_unit_induk', '=', 'ui.id')
            ->leftJoin('unitpelaksanas as up', 'realkpi.id_pelaksana', '=', 'up.id')
            ->leftJoin('unitlayanans as ul', 'realkpi.id_layanan', '=', 'ul.id')
            ->select(
                'realkpi.*',
                'kpis.id as kpi_id',
                'kpis.indikator_kinerja',
                'kpis.jenis_indikator',
                'kpis.bobot',
                'kpis.polaritas',
                'kpis.tahun',
                'ui.nama_unit_induk as unit_induk',
                'up.nama_unit_pelaksana as unit_pelaksana',
                'ul.nama_unit_layanan_bagian as unit_layanan'
            );

           // Filter berdasarkan request
        if ($request->filled('id_unit_induk')) {
            $query->where('realkpi.id_unit_induk', $id_unit_induk);
        }
        if ($request->filled('id_pelaksana')) {
            $query->where('realkpi.id_pelaksana', $id_pelaksana);
        }
        if ($request->filled('id_layanan')) {
            $query->where('realkpi.id_layanan', $id_layanan);
        }
        if ($request->filled('bulan')) {
            $query->where('realkpi.bulan', $bulan);
        }
        if ($request->filled('tahun')) {
            $query->where('kpis.tahun', $tahun);
        }

        // ✅ Eksekusi Query dengan Grouping
        $data = $query->get();

        return Excel::download(new RealisasiKPIExport($data), 'realisasi_kpi.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new RealisasiKPIImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data berhasil diimport dan diperbarui!');
    }

    public function editsubkpi($id)
    {
        $realkpi = \App\Models\Realkpi::findOrFail($id);
        return view('pages.realkpis.editsubkpi', compact('realkpi'));
    }

    public function updatesubkpi(Request $request)
    {
        $id = $request->id;

        DB::table('realkpis')->where('id',$id)->update([
            'nama_sub_kpi' => $request->nama_sub_kpi,
            'bobot_subkpi' => $request->bobot_subkpi
		]);

        return redirect()->route('realkpi.index')->with('success', 'Data successfully updated');
    }

}
