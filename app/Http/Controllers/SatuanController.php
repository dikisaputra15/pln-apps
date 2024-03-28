<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSatuanRequest;
use App\Http\Requests\UpdateSatuanRequest;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $satuans = DB::table('satuans')
            ->when($request->input('name'), function($query, $name){
                return $query->where('nama_satuan', 'like', '%'.$name.'%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.satuans.index', compact('satuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.satuans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSatuanRequest $request)
    {
        $data = $request->all();
        \App\Models\Satuan::create($data);
        return redirect()->route('satuan.index')->with('success', 'Data successfully created');
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
        $satuan = \App\Models\Satuan::findOrFail($id);
        return view('pages.satuans.edit', compact('satuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSatuanRequest $request, Satuan $satuan)
    {
        $data = $request->validated();
        $satuan->update($data);
        return redirect()->route('satuan.index')->with('success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Satuan $satuan)
    {
        $satuan->delete();
        return redirect()->route('satuan.index')->with('success', 'Data ßsuccessfully deleted');
    }
}
