<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRkmRequest;
use App\Http\Requests\UpdateRkmRequest;
use App\Models\Rkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Imports\RkmdetailImport;
use Maatwebsite\Excel\Facades\Excel;

class RkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $indikators = DB::table('rkms')
        ->join('unitinduks', 'unitinduks.id', '=', 'rkms.id_unit_induk')
        ->join('unitpelaksanas', 'unitpelaksanas.id', '=', 'rkms.id_pelaksana')
        ->join('unitlayanans', 'unitlayanans.id', '=', 'rkms.id_layanan')
        ->join('kpis', 'kpis.id', '=', 'rkms.indikator_kinerja_kpi')
        ->join('satuans as satuan_rkm', 'satuan_rkm.id', '=', 'rkms.id_satuan_rkm')
        ->join('satuans as satuan_kpi', 'satuan_kpi.id', '=', 'kpis.id_satuan')
        ->select('rkms.*', 'kpis.indikator_kinerja', 'satuan_kpi.nama_satuan as nama_satuan_kpi', 'satuan_rkm.nama_satuan as nama_satuan_rkm', 'unitinduks.nama_unit_induk', 'unitpelaksanas.nama_unit_pelaksana', 'unitlayanans.nama_unit_layanan_bagian')
        ->when($request->input('name'), function($query, $name){
            return $query->where('indikator_rkm', 'like', '%'.$name.'%');
        })
        ->orderBy('rkms.id', 'desc')
        ->paginate(10);
        return view('pages.rkms.index', compact('indikators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unitinduks = DB::table('unitinduks')->get();
        $indikators = DB::table('kpis')->get();
        $satuans = DB::table('satuans')->get();
        return view('pages.rkms.create', compact('unitinduks','indikators','satuans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRkmRequest $request)
    {
        Rkm::create([
            'id_unit_induk' => $request->id_unit_induk,
            'id_pelaksana' => $request->id_pelaksana,
            'id_layanan' => $request->id_layanan,
            'indikator_kinerja_kpi' => $request->id_indikator_kpi,
            'bobot_rkm' => $request->bobot_rkm,
            'polaritas_rkm' => $request->polaritas_rkm,
            'indikator_rkm' => $request->indikator_rkm,
            'id_satuan_rkm' => $request->id_satuan_rkm
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
        $indikators = DB::table('kpis')->get();
        $satuans = DB::table('satuans')->get();
        $rkm = \App\Models\Rkm::findOrFail($id);

        return view('pages.rkms.edit', compact('unitinduks','unitpelaksanas','unitlayanans','indikators','satuans', 'rkm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::table('rkms')->where('id',$id)->update([
            'id_unit_induk' => $request->id_unit_induk,
            'id_pelaksana' => $request->id_pelaksana,
            'id_layanan' => $request->id_layanan,
            'indikator_kinerja_kpi' => $request->id_indikator_kpi,
            'bobot_rkm' => $request->bobot_rkm,
            'polaritas_rkm' => $request->polaritas_rkm,
            'indikator_rkm' => $request->indikator_rkm,
            'id_satuan_rkm' => $request->id_satuan_rkm
		]);
        return redirect()->route('rkm.index')->with('success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('rkms')
        ->where('id', $id)
        ->delete();
        return redirect()->route('rkm.index')->with('success', 'Data ßsuccessfully deleted');
    }

    public function importExcel(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|mimes:xlsx,csv,xls',
        //     'unit_induk_id' => 'required|exists:tabel_kpi,unit_induk_id',
        // ]);

        $rkm_id = $request->rkm_id;
        Excel::import(new RkmdetailImport($rkm_id), $request->file('file'));

        return redirect()->route('rkmdetail.index')->with('success', 'Data berhasil diimpor.');
    }
}
