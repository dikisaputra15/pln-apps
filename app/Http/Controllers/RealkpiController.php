<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRealkpiRequest;
use Illuminate\Http\Request;
use App\Models\Realkpi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RealkpiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $indikators = DB::table('realkpis')
        ->join('kpis', 'kpis.id', '=', 'realkpis.id_indikator_kpi')
        ->select('realkpis.*', 'kpis.indikator_kinerja')
        ->when($request->input('name'), function($query, $name){
            return $query->where('kpis.indikator_kinerja', 'like', '%'.$name.'%');
        })
        ->orderBy('realkpis.id', 'desc')
        ->paginate(10);
        return view('pages.realkpis.index', compact('indikators'));
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
         $pencapaian = ($request->realisasi/$request->target)*100;
        $nilai = ($pencapaian*$request->bobot)/100;

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

        $pencapaian = ($request->realisasi/$request->target)*100;
        $nilai = ($pencapaian*$request->bobot)/100;

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
}
