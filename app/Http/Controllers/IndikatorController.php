<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIndikatorRequest;
use App\Http\Requests\UpdateIndikatorRequest;
use App\Models\Kpi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $indikators = DB::table('kpis')
        ->join('kategoris', 'kategoris.id', '=', 'kpis.id_kategori')
        ->join('satuans', 'satuans.id', '=', 'kpis.id_satuan')
        ->select('kpis.*', 'kategoris.nama_kategori', 'satuans.nama_satuan')
        ->when($request->input('name'), function($query, $name){
            return $query->where('indikator_kinerja', 'like', '%'.$name.'%');
        })
        ->orderBy('kpis.id', 'desc')
        ->paginate(10);
        return view('pages.indikators.index', compact('indikators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = DB::table('kategoris')->get();
        $satuans = DB::table('satuans')->get();
        return view('pages.indikators.create', compact('kategoris','satuans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIndikatorRequest $request)
    {
        // $pencapaian = ($request->realisasi/$request->target)*100;
        // $nilai = ($pencapaian*$request->bobot)/100;

        // if($request->realisasi == 0){
        //     $status = 'belum';
        // }else if($pencapaian >= 100){
        //     $status = 'baik';
        // }else if($pencapaian >= 95){
        //     $status = 'hati-hati';
        // }else{
        //     $status = 'masalah';
        // }

       $kpi = Kpi::create([
            'indikator_kinerja' => $request->indikator_kinerja,
            'jenis_indikator' => $request->jenis_indikator,
            'id_kategori' => $request->id_kategori,
            'id_satuan' => $request->id_satuan,
            'bobot' => $request->bobot,
            'polaritas' => $request->polaritas,
            'tahun' => $request->tahun
        ]);

        if($kpi){
            $lastInsertedId = $kpi->id;
            $units = DB::table('unitlayanans')->get();

            $bulan_array = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
            $data_insert = [];

            $realisasi = 0;

            if($realisasi == 0){
                $status = 'belum';
            }else if($pencapaian >= 100){
                $status = 'baik';
            }else if($pencapaian >= 95){
                $status = 'hati-hati';
            }else{
                $status = 'masalah';
            }

            foreach ($units as $unit) {
                foreach ($bulan_array as $bulan) {
                    $data_insert[] = [
                        'id_unit_induk' => $unit->id_unit_induk,
                        'id_pelaksana' => $unit->id_pelaksana,
                        'id_layanan' => $unit->id,
                        'id_indikator_kpi' => $lastInsertedId,
                        'bulan' => $bulan,
                        'target' => 0,
                        'realisasi' => $realisasi,
                        'pencapaian' => 0,
                        'nilai' => 0,
                        'status' => $status,
                        'penjelasan' => ''
                    ];
                }
            }

            DB::table('realkpis')->insert($data_insert);
        }

        return redirect()->route('indikator.index')->with('success', 'Data successfully created');
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
        $kategoris = DB::table('kategoris')->get();
        $satuans = DB::table('satuans')->get();
        $indikator = \App\Models\Kpi::findOrFail($id);
        return view('pages.indikators.edit', compact('unitinduks','unitpelaksanas','unitlayanans','kategoris','satuans', 'indikator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIndikatorRequest $request, Kpi $indikator)
    {
        $data = $request->validated();
        $indikator->update($data);
        return redirect()->route('indikator.index')->with('success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kpi $indikator)
    {
        $indikator->delete();
        return redirect()->route('indikator.index')->with('success', 'Data ßsuccessfully deleted');
    }

    public function performance()
    {
        return view('pages.indikators.kpioverview');
    }

    public function cardperformance(Request $request)
    {
        $uinduk = $request->id_unit_induk;
        $upelaksana = $request->id_pelaksana;
        $ulayanan = $request->id_layanan;
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $cards = DB::table('indikatorkinerjas')
                ->where('id_unit_induk', $uinduk)
                ->where('id_pelaksana', $upelaksana)
                ->where('id_layanan', $ulayanan)
                ->where('bulan', $bulan)
                ->where('tahun', $tahun)
                ->get();
        $unitinduks = DB::table('unitinduks')->get();
        return view('pages.indikators.card_performance', compact('unitinduks','cards'));
    }

    public function realisasikpi()
    {
        $unitinduks = DB::table('unitinduks')->get();
        return view('pages.indikators.form_realisasikpi', compact('unitinduks'));
    }

    public function viewrealisasi(Request $request)
    {
        $uinduk = $request->id_unit_induk;
        $upelaksana = $request->id_pelaksana;
        $ulayanan = $request->id_layanan;
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $unitinduks = DB::table('unitinduks')->get();
        $indikators = DB::table('indikatorkinerjas')
        ->join('unitinduks', 'unitinduks.id', '=', 'indikatorkinerjas.id_unit_induk')
        ->join('unitpelaksanas', 'unitpelaksanas.id', '=', 'indikatorkinerjas.id_pelaksana')
        ->join('unitlayanans', 'unitlayanans.id', '=', 'indikatorkinerjas.id_layanan')
        ->join('kategoris', 'kategoris.id', '=', 'indikatorkinerjas.id_kategori')
        ->join('aspirasis', 'aspirasis.id', '=', 'indikatorkinerjas.id_aspirasi')
        ->join('satuans', 'satuans.id', '=', 'indikatorkinerjas.id_satuan')
        ->select('indikatorkinerjas.*', 'kategoris.nama_kategori', 'aspirasis.nama_aspirasi', 'satuans.nama_satuan', 'unitinduks.nama_unit_induk', 'unitpelaksanas.nama_unit_pelaksana', 'unitlayanans.nama_unit_layanan_bagian')
        ->where('indikatorkinerjas.id_unit_induk', $uinduk)
        ->where('indikatorkinerjas.id_pelaksana', $upelaksana)
        ->where('indikatorkinerjas.id_layanan', $ulayanan)
        ->where('indikatorkinerjas.bulan', $bulan)
        ->where('indikatorkinerjas.tahun', $tahun)
        ->get();

        return view('pages.indikators.view_realisasi', compact('unitinduks','indikators'));
    }
}
