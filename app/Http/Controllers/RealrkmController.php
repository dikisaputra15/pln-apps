<?php

namespace App\Http\Controllers;

use App\Models\Realisasirkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RealrkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $realrkms = DB::table('realisasirkms')
        ->join('rkms', 'rkms.id', '=', 'realisasirkms.id_rkm')
        ->join('rekaprkms', 'rekaprkms.id', '=', 'realisasirkms.id_rekap_rkm')
        ->select('realisasirkms.*', 'rkms.nama_indikator_rkm', 'rekaprkms.id')
        ->when($request->input('name'), function($query, $name){
            return $query->where('kendala', 'like', '%'.$name.'%');
        })
        ->orderBy('realisasirkms.id', 'desc')
        ->paginate(10);
        return view('pages.realisasirkms.index', compact('realrkms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rkms = DB::table('rkms')->get();
        $rekaprkms = DB::table('rekaprkms')->get();
        return view('pages.realisasirkms.create', compact('rkms','rekaprkms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Realisasirkm::create([
            'id_rekap_rkm' => $request->id_rekaprkm,
            'id_rkm' => $request->id_rkm,
            'id_p' => $request->id_p,
            'tanggal' => $request->tanggal,
            'alamat' => $request->alamat,
            'daya' => $request->daya,
            'satuan_hasil' => $request->satuan_hasil,
            'estimasi_hasil' => $request->estimasi_hasil
        ]);

        return redirect()->route('realrkm.index')->with('success', 'Data successfully created');
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
    public function destroy(Realisasirkm $realisasirkm)
    {
        $realisasirkm->delete();
        return redirect()->route('realrkm.index')->with('success', 'Data ßsuccessfully deleted');
    }

    public function destroyreal($id)
    {
        DB::table('realisasirkms')->where('id', $id)->delete();
        return redirect()->route('realrkm.index')->with('success', 'Data ßsuccessfully deleted');
    }
}
