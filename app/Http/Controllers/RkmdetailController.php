<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RkmdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $indikators = DB::table('rkms')
        ->join('rkmdetails', 'rkmdetails.id_rkm', '=', 'rkms.id')
        ->join('unitinduks', 'unitinduks.id', '=', 'rkms.id_unit_induk')
        ->join('unitpelaksanas', 'unitpelaksanas.id', '=', 'rkms.id_pelaksana')
        ->join('unitlayanans', 'unitlayanans.id', '=', 'rkms.id_layanan')
        ->join('kpis', 'kpis.id', '=', 'rkms.indikator_kinerja_kpi')
        ->join('satuans as satuan_rkm', 'satuan_rkm.id', '=', 'rkms.id_satuan_rkm')
        ->join('satuans as satuan_kpi', 'satuan_kpi.id', '=', 'kpis.id_satuan')
        ->select('rkms.*', 'kpis.indikator_kinerja', 'satuan_kpi.nama_satuan as nama_satuan_kpi', 'satuan_rkm.nama_satuan as nama_satuan_rkm', 'unitinduks.nama_unit_induk', 'unitpelaksanas.nama_unit_pelaksana', 'unitlayanans.nama_unit_layanan_bagian', 'rkmdetails.id_pel', 'rkmdetails.uraian_nama', 'rkmdetails.tanggal')
        ->orderBy('rkms.id', 'desc')
        ->paginate(10);
        return view('pages.rkmdetails.index', compact('indikators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
