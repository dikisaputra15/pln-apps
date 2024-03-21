<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRealRequest;
use App\Http\Requests\UpdateRealRequest;
use App\Models\Real;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $reals = DB::table('reals')
        ->when($request->input('up3'), function($query, $up3){
            return $query->where('up3', 'like', '%'.$up3.'%');
        })
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('pages.reals.index', compact('reals'));
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
    public function destroy(Real $real)
    {
        $real->delete();
        return redirect()->route('real.index')->with('success', 'User successfully deleted');
    }
}
