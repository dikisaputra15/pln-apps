<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUnitindukRequest;
use App\Http\Requests\UpdateUnitIndukRequest;
use App\Models\Unitinduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UnitindukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $unitinduks = DB::table('unitinduks')
            ->when($request->input('name'), function($query, $name){
                return $query->where('nama_unit_induk', 'like', '%'.$name.'%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.unitinduks.index', compact('unitinduks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.unitinduks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUnitindukRequest $request)
    {
        $data = $request->all();
        \App\Models\Unitinduk::create($data);
        return redirect()->route('unitinduk.index')->with('success', 'Data successfully created');
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
        $unitinduk = \App\Models\Unitinduk::findOrFail($id);
        return view('pages.unitinduks.edit', compact('unitinduk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitIndukRequest $request, Unitinduk $unitinduk)
    {
        $data = $request->validated();
        $unitinduk->update($data);
        return redirect()->route('unitinduk.index')->with('success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unitinduk $unitinduk)
    {
        $unitinduk->delete();
        return redirect()->route('unitinduk.index')->with('success', 'Data ßsuccessfully deleted');
    }
}
