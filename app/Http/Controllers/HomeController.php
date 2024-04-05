<?php

namespace App\Http\Controllers;

use App\Models\Realisasirkm;
use App\Models\Unitpelaksana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home.index');
    }

    public function editfetchlayanan(Request $request)
    {
        $unit_induk = $request->unit_induk;

        $unitlayanans = Unitpelaksana::where('id_unit_induk', $unit_induk)->get();

        foreach ($unitlayanans as $unitlayanan) {
            echo "<option value='$unitlayanan->id'>$unitlayanan->nama_unit_pelaksana</option>";
        }
    }

    public function editrealisasirkm($id)
    {
        // $rekaprkms = DB::table('rekaprkms')->get();
        // $rkms = DB::table('rkms')->get();
        $realisasirkm = \App\Models\Realisasirkm::findOrFail($id);
        return view('editrealisasirkm', compact(['realisasirkm']));
    }
}
