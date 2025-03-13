<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Subkpi;

class SubkpiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $subkpis = DB::table('subkpis')
        ->join('kpis', 'kpis.id', '=', 'subkpis.id_kpi')
        ->select('subkpis.*', 'kpis.indikator_kinerja')
        ->when($request->input('name'), function($query, $name){
            return $query->where('nama_sub_kpi', 'like', '%'.$name.'%');
        })
        ->orderBy('subkpis.id', 'desc')
        ->paginate(10);
        return view('pages.subkpis.index', compact('subkpis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kpis = DB::table('kpis')->get();
        return view('pages.subkpis.create', compact('kpis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Subkpi::create([
            'id_kpi' => $request->id_kpi,
            'nama_sub_kpi' => $request->nama_sub_kpi
        ]);
        return redirect()->route('subkpi.index')->with('success', 'Data successfully created');
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
