<?php

namespace App\Http\Controllers;

use App\Models\Rkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rkms = DB::table('rkms')
        ->join('unitinduks', 'unitinduks.id', '=', 'rkms.id_unit_induk')
        ->join('unitpelaksanas', 'unitpelaksanas.id', '=', 'rkms.id_pelaksana')
        ->join('unitlayanans', 'unitlayanans.id', '=', 'rkms.id_layanan')
        ->join('kategoris', 'kategoris.id', '=', 'rkms.id_kategori')
        ->join('aspirasis', 'aspirasis.id', '=', 'rkms.id_aspirasi')
        ->join('indikators', 'indikators.id', '=', 'rkms.id_indikator')
        ->join('satuans', 'satuans.id', '=', 'nkos.id_satuan')
        ->select('nkos.*', 'unitinduks.nama_unit_induk', 'unitpelaksanas.nama_unit_pelaksana', 'unitlayanans.nama_unit_layanan_bagian', 'kategoris.nama_kategori', 'aspirasis.nama_aspirasi', 'indikators.nama_indikator', 'satuans.nama_satuan')
        ->when($request->input('name'), function($query, $name){
            return $query->where('nama_indikator_rkm', 'like', '%'.$name.'%');
        })
        ->orderBy('rkms.id', 'desc')
        ->paginate(10);
        return view('pages.rkms.index', compact('rkms'));
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
