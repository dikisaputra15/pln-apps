<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUnitPelaksanaRequest;
use App\Models\Unitpelaksana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UnitPelaksanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $unitpelaksanas = DB::table('unitpelaksanas')
            ->join('unitinduks', 'unitinduks.id', '=', 'unitpelaksanas.id_unit_induk')
            ->select('unitpelaksanas.*', 'unitinduks.nama_unit_induk')
            ->when($request->input('name'), function($query, $name){
                return $query->where('nama_unit_pelaksana', 'like', '%'.$name.'%');
            })
            ->orderBy('unitpelaksanas.id', 'desc')
            ->paginate(10);
        return view('pages.unitpelaksanas.index', compact('unitpelaksanas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unitinduks = DB::table('unitinduks')->get();
        return view('pages.unitpelaksanas.create', compact('unitinduks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Unitpelaksana::create([
            'id_unit_induk' => $request->id_unit_induk,
            'nama_unit_pelaksana' => $request->nama_unit_pelaksana
        ]);
        return redirect()->route('unitpelaksana.index')->with('success', 'Data successfully created');
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
        $unitpelaksana = \App\Models\Unitpelaksana::findOrFail($id);
        return view('pages.unitpelaksanas.edit', compact('unitinduks','unitpelaksana'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitPelaksanaRequest $request, Unitpelaksana $unitpelaksana)
    {
        $data = $request->validated();
        $unitpelaksana->update($data);
        return redirect()->route('unitpelaksana.index')->with('success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unitpelaksana $unitpelaksana)
    {
        $unitpelaksana->delete();
        return redirect()->route('unitpelaksana.index')->with('success', 'Data ßsuccessfully deleted');
    }
}
