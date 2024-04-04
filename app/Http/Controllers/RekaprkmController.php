<?php

namespace App\Http\Controllers;

use App\Models\Rekapkinerja;
use App\Models\Rekaprkm;
use App\Models\Rkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RekaprkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rekaprkms = DB::table('rekaprkms')
        ->join('rkms', 'rkms.id', '=', 'rekaprkms.id_rkm')
        ->join('rekapkinerjas', 'rekapkinerjas.id', '=', 'rekaprkms.id_rekap_kinerja')
        ->select('rekaprkms.*', 'rkms.nama_indikator_rkm', 'rekapkinerjas.penjelasan')
        ->when($request->input('name'), function($query, $name){
            return $query->where('kendala', 'like', '%'.$name.'%');
        })
        ->orderBy('rekaprkms.id', 'desc')
        ->paginate(10);
        return view('pages.rekaprkms.index', compact('rekaprkms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $rkms = DB::table('rkms')->get();
        $rekapkinerjas = DB::table('rekapkinerjas')->get();
        return view('pages.rekaprkms.create', compact('rkms','rekapkinerjas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $extension = $request->file('foto')->extension();
        $file = $request->file('foto');

        $nama_foto = $file->getClientOriginalName();

        $nama_file = str_replace(" ", "-", $nama_foto);
        $num = hexdec(uniqid());

        $filename = $num.'_'.$nama_file;

        $request->file('foto')->move(
            base_path() . '/public/image/evident/', $filename
        );

        Rekaprkm::create([
            'id_rkm' => $request->id_rkm,
            'id_rekap_kinerja' => $request->id_rekap_kinerja,
            'target_harian' => $request->target_harian,
            'realisasi_harian' => $request->realisasi_harian,
            'biaya' => $request->biaya,
            'tanggal' => $request->tanggal,
            'tahun' => $request->tahun,
            'satuan_hasil' => $request->satuan_hasil,
            'target_hasil' => $request->target_hasil,
            'realisasi_hasil' => $request->realisasi_hasil,
            'kendala' => $request->kendala,
            'mitigasi' => $request->mitigasi,
            'photo_evident' => $filename
        ]);

        return redirect()->route('rekaprkm.index')->with('success', 'Data successfully created');
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
