<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIndikatorRequest;
use App\Http\Requests\UpdateIndikatorRequest;
use App\Models\Indikator;
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
        $indikators = DB::table('indikators')
        ->join('kategoris', 'kategoris.id', '=', 'indikators.id_kategori')
        ->join('aspirasis', 'aspirasis.id', '=', 'indikators.id_aspirasi')
        ->join('satuans', 'satuans.id', '=', 'indikators.id_satuan')
        ->select('indikators.*', 'kategoris.nama_kategori', 'aspirasis.nama_aspirasi', 'satuans.nama_satuan')
        ->when($request->input('name'), function($query, $name){
            return $query->where('indikator_kinerja', 'like', '%'.$name.'%');
        })
        ->orderBy('indikators.id', 'desc')
        ->paginate(10);
    return view('pages.indikators.index', compact('indikators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = DB::table('kategoris')->get();
        $aspirasis = DB::table('aspirasis')->get();
        $satuans = DB::table('satuans')->get();
        return view('pages.indikators.create', compact('kategoris','aspirasis','satuans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIndikatorRequest $request)
    {
        $data = $request->all();
        \App\Models\Indikator::create($data);
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
        $kategoris = DB::table('kategoris')->get();
        $aspirasis = DB::table('aspirasis')->get();
        $satuans = DB::table('satuans')->get();
        $indikator = \App\Models\Indikator::findOrFail($id);
        return view('pages.indikators.edit', compact('kategoris','aspirasis','satuans', 'indikator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIndikatorRequest $request, Indikator $indikator)
    {
        $data = $request->validated();
        $indikator->update($data);
        return redirect()->route('indikator.index')->with('success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Indikator $indikator)
    {
        $indikator->delete();
        return redirect()->route('indikator.index')->with('success', 'Data ßsuccessfully deleted');
    }
}
