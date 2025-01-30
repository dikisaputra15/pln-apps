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
        ->join('unitinduks', 'unitinduks.id', '=', 'rkmrealisasis.id_unit_induk')
        ->join('unitpelaksanas', 'unitpelaksanas.id', '=', 'rkmrealisasis.id_pelaksana')
        ->join('unitlayanans', 'unitlayanans.id', '=', 'rkmrealisasis.id_layanan')
        ->join('kpis', 'kpis.id', '=', 'rkmrealisasis.indikator_kinerja_kpi')
        ->join('rkms', 'rkms.id', '=', 'rkmrealisasis.indikator_rkm')
        ->join('satuans as satuan_rkm', 'satuan_rkm.id', '=', 'rkms.id_satuan_rkm')
        ->join('satuans as satuan_kpi', 'satuan_kpi.id', '=', 'kpis.id_satuan')
        ->select('rkmrealisasis.*', 'unitinduks.nama_unit_induk', 'unitpelaksanas.nama_unit_pelaksana', 'unitlayanans.nama_unit_layanan_bagian', 'kpis.aspirasi', 'kpis.indikator_kinerja', 'kpis.bobot', 'kpis.polaritas', 'satuan_kpi.nama_satuan as nama_satuan_kpi', 'satuan_rkm.nama_satuan as nama_satuan_rkm', 'rkms.indikator_rkm')
        ->when($request->input('name'), function($query, $name){
            return $query->where('tahun', 'like', '%'.$name.'%');
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
        $unitinduks = DB::table('unitinduks')->get();
        $satuans = DB::table('satuans')->get();
        $indikators = DB::table('kpis')->get();
        $rkms = DB::table('rkms')->get();
        return view('pages.realisasirkms.create', compact('unitinduks','indikators','satuans','rkms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Rkmrealisasi::create([
            'id_unit_induk' => $request->id_unit_induk,
            'id_pelaksana' => $request->id_pelaksana,
            'id_layanan' => $request->id_layanan,
            'indikator_kinerja_kpi' => $request->indikator_kinerja_kpi,
            'indikator_rkm' => $request->indikator_rkm,
            'biaya' => $request->biaya,
            'tanggal' => $request->tanggal,
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'minggu' => $request->minggu,
            'minggu_bulan' => $request->minggu_bulan,
            'target_tahun' => $request->target_tahun,
            'target_bulan' => $request->target_bulan,
            'target_mingguan' => $request->target_mingguan,
            'target_harian' => $request->target_harian,
            'realisasi_tahunan' => $request->realisasi_tahunan,
            'realisasi_bulanan' => $request->realisasi_bulanan,
            'realisasi_mingguan' => $request->realisasi_mingguan,
            'realisasi_harian' => $request->realisasi_harian,
            'persen_tahun' => $request->persen_tahun,
            'persen_bulan' => $request->persen_bulan,
            'persen_minggu' => $request->persen_minggu,
            'tipe_target_hasil' => $request->tipe_target_hasil,
            'satuan_hasil' => $request->satuan_hasil,
            'target_hasil_tahunan' => $request->target_hasil_tahunan,
            'target_hasil_bulanan' => $request->target_hasil_bulanan,
            'target_hasil_mingguan' => $request->target_hasil_mingguan,
            'target_hasil_harian' => $request->target_hasil_harian,
            'realisasi_hasil_tahunan' => $request->realisasi_hasil_tahunan,
            'realisasi_hasil_bulanan' => $request->realisasi_hasil_bulanan,
            'realisasi_hasil_mingguan' => $request->realisasi_hasil_mingguan,
            'realisasi_hasil_harian' => $request->realisasi_hasil_harian
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
        $unitinduks = DB::table('unitinduks')->get();
        $unitpelaksanas = DB::table('unitpelaksanas')->get();
        $unitlayanans = DB::table('unitlayanans')->get();
        $indikators = DB::table('kpis')->get();
        $rkms = DB::table('rkms')->get();
        $rkmrealisasi = \App\Models\Rkmrealisasi::findOrFail($id);
        return view('pages.realisasirkms.edit', compact('unitinduks','unitpelaksanas','unitlayanans','indikators','rkms','rkmrealisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::table('rkmrealisasis')->where('id',$id)->update([
			'id_unit_induk' => $request->id_unit_induk,
            'id_pelaksana' => $request->id_pelaksana,
            'id_layanan' => $request->id_layanan,
            'indikator_kinerja_kpi' => $request->indikator_kinerja_kpi,
            'indikator_rkm' => $request->indikator_rkm,
            'biaya' => $request->biaya,
            'tanggal' => $request->tanggal,
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'minggu' => $request->minggu,
            'minggu_bulan' => $request->minggu_bulan,
            'target_tahun' => $request->target_tahun,
            'target_bulan' => $request->target_bulan,
            'target_mingguan' => $request->target_mingguan,
            'target_harian' => $request->target_harian,
            'realisasi_tahunan' => $request->realisasi_tahunan,
            'realisasi_bulanan' => $request->realisasi_bulanan,
            'realisasi_mingguan' => $request->realisasi_mingguan,
            'realisasi_harian' => $request->realisasi_harian,
            'persen_tahun' => $request->persen_tahun,
            'persen_bulan' => $request->persen_bulan,
            'persen_minggu' => $request->persen_minggu,
            'tipe_target_hasil' => $request->tipe_target_hasil,
            'satuan_hasil' => $request->satuan_hasil,
            'target_hasil_tahunan' => $request->target_hasil_tahunan,
            'target_hasil_bulanan' => $request->target_hasil_bulanan,
            'target_hasil_mingguan' => $request->target_hasil_mingguan,
            'target_hasil_harian' => $request->target_hasil_harian,
            'realisasi_hasil_tahunan' => $request->realisasi_hasil_tahunan,
            'realisasi_hasil_bulanan' => $request->realisasi_hasil_bulanan,
            'realisasi_hasil_mingguan' => $request->realisasi_hasil_mingguan,
            'realisasi_hasil_harian' => $request->realisasi_hasil_harian
		]);

        return redirect()->route('rkmrealisasi.index')->with('success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('rkmrealisasis')
        ->where('id', $id)
        ->delete();
        return redirect()->route('rkmrealisasi.index')->with('success', 'Data ßsuccessfully deleted');
    }
}
