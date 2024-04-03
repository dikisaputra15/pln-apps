<?php

namespace App\Http\Controllers;

use App\Models\Nko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NkoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $nkos = DB::table('nkos')
        ->join('unitinduks', 'unitinduks.id', '=', 'nkos.id_unit_induk')
        ->join('unitpelaksanas', 'unitpelaksanas.id', '=', 'nkos.id_pelaksana')
        ->join('unitlayanans', 'unitlayanans.id', '=', 'nkos.id_layanan')
        ->select('nkos.*', 'unitinduks.nama_unit_induk', 'unitpelaksanas.nama_unit_pelaksana', 'unitlayanans.nama_unit_layanan_bagian')
        ->when($request->input('name'), function($query, $name){
            return $query->where('target_bulan', 'like', '%'.$name.'%');
        })
        ->orderBy('nkos.id', 'desc')
        ->paginate(10);
        return view('pages.nkos.index', compact('nkos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unitinduks = DB::table('unitinduks')->get();
        return view('pages.nkos.create', compact('unitinduks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        \App\Models\Nko::create($data);
        return redirect()->route('nko.index')->with('success', 'Data successfully created');
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
        $nko = \App\Models\Nko::findOrFail($id);
        return view('pages.nkos.edit', compact('unitinduks','unitpelaksanas','unitlayanans','nko'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nko $nko)
    {
        $data = $request->validated();
        $nko->update($data);
        return redirect()->route('nko.index')->with('success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nko $nko)
    {
        $nko->delete();
        return redirect()->route('nko.index')->with('success', 'Data ßsuccessfully deleted');
    }
}
