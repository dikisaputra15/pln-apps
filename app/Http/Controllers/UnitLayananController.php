<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUnitLayananRequest;
use App\Models\Unitlayanan;
use App\Models\Unitpelaksana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UnitLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $unitlayanans = DB::table('unitlayanans')
            ->join('unitinduks', 'unitinduks.id', '=', 'unitlayanans.id_unit_induk')
            ->join('unitpelaksanas', 'unitpelaksanas.id', '=', 'unitlayanans.id_pelaksana')
            ->select('unitlayanans.*', 'unitpelaksanas.nama_unit_pelaksana', 'unitinduks.nama_unit_induk')
            ->when($request->input('name'), function($query, $name){
                return $query->where('nama_unit_layanan_bagian', 'like', '%'.$name.'%');
            })
            ->orderBy('unitlayanans.id', 'desc')
            ->paginate(10);
        return view('pages.unitlayanans.index', compact('unitlayanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unitinduks = DB::table('unitinduks')->get();
        return view('pages.unitlayanans.create', compact('unitinduks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Unitlayanan::create([
            'id_unit_induk' => $request->id_unit_induk,
            'id_pelaksana' => $request->id_pelaksana,
            'nama_unit_layanan_bagian' => $request->nama_unit_layanan_bagian
        ]);
        return redirect()->route('unitlayanan.index')->with('success', 'Data successfully created');
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
        $unitlayanan = \App\Models\Unitlayanan::findOrFail($id);
        return view('pages.unitlayanans.edit', compact('unitinduks','unitpelaksanas','unitlayanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitLayananRequest $request, Unitlayanan $unitlayanan)
    {
        $data = $request->validated();
        $unitlayanan->update($data);
        return redirect()->route('unitlayanan.index')->with('success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unitlayanan $unitlayanan)
    {
        $unitlayanan->delete();
        return redirect()->route('unitlayanan.index')->with('success', 'Data ßsuccessfully deleted');
    }

    public function fetchlayanan(Request $request)
    {
        $unit_induk = $request->unit_induk;

        $unitlayanans = Unitpelaksana::where('id_unit_induk', $unit_induk)->get();

        foreach ($unitlayanans as $unitlayanan) {
            echo "<option value='$unitlayanan->id'>$unitlayanan->nama_unit_pelaksana</option>";
        }
    }

    public function fetchpelaksana(Request $request)
    {
        $unit_layanan = $request->unit_pelaksana;

        $unitpelaksanas = Unitlayanan::where('id_pelaksana', $unit_layanan)->get();

        foreach ($unitpelaksanas as $unitpelaksana) {
            echo "<option value='$unitpelaksana->id'>$unitpelaksana->nama_unit_layanan_bagian</option>";
        }
    }
}
