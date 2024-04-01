<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAspirasiRequest;
use App\Http\Requests\UpdateAspirasiRequest;
use App\Models\Aspirasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $aspirasis = DB::table('aspirasis')
            ->when($request->input('name'), function($query, $name){
                return $query->where('nama_aspirasi', 'like', '%'.$name.'%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.aspirasis.index', compact('aspirasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.aspirasis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAspirasiRequest $request)
    {
        $data = $request->all();
        \App\Models\Aspirasi::create($data);
        return redirect()->route('aspirasi.index')->with('success', 'Data successfully created');
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
        $aspirasi = \App\Models\Aspirasi::findOrFail($id);
        return view('pages.aspirasis.edit', compact('aspirasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAspirasiRequest $request, Aspirasi $aspirasi)
    {
        $data = $request->validated();
        $aspirasi->update($data);
        return redirect()->route('aspirasi.index')->with('success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aspirasi $aspirasi)
    {
        $aspirasi->delete();
        return redirect()->route('aspirasi.index')->with('success', 'Data ßsuccessfully deleted');
    }
}
