<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNkoRequest;
use App\Http\Requests\UpdateNkoRequest;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
