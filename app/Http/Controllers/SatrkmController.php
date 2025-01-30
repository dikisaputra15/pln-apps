<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSatuanrkmRequest;
use App\Models\Satuanrkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SatrkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $satuans = DB::table('satuanrkms')
        ->when($request->input('name'), function($query, $name){
            return $query->where('nama_satuan_rkm', 'like', '%'.$name.'%');
        })
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('pages.satuanrkms.index', compact('satuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.satuanrkms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSatuanrkmRequest $request)
    {
        $data = $request->all();
        \App\Models\Satuanrkm::create($data);
        return redirect()->route('satrkm.index')->with('success', 'Data successfully created');
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
        $satuanrkm = \App\Models\Satuanrkm::findOrFail($id);
        return view('pages.satuanrkms.edit', compact('satuanrkm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::table('satuanrkms')->where('id',$id)->update([
            'nama_satuan_rkm' => $request->nama_satuan_rkm,
		]);
        return redirect()->route('satrkm.index')->with('success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($satuanrkm)
    {
        DB::table('satuanrkms')
        ->where('id', $satuanrkm)
        ->delete();
        return redirect()->route('satrkm.index')->with('success', 'Data ßsuccessfully deleted');
    }
}
