<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        //$users = \App\Models\User::paginate(10);
        $users = DB::table('users')
            ->join('unitinduks', 'unitinduks.id', '=', 'users.id_unit_induk')
            ->join('unitpelaksanas', 'unitpelaksanas.id', '=', 'users.id_pelaksana')
            ->join('unitlayanans', 'unitlayanans.id', '=', 'users.id_layanan')
            ->select('users.*', 'unitinduks.nama_unit_induk', 'unitpelaksanas.nama_unit_pelaksana', 'unitlayanans.nama_unit_layanan_bagian')
            ->when($request->input('name'), function($query, $name){
                return $query->where('name', 'like', '%'.$name.'%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.users.index', compact('users'));
    }

    public function create()
    {
        $unitinduks = DB::table('unitinduks')->get();
        return view('pages.users.create', compact('unitinduks'));
    }

    public function store(Request $request)
    {
        User::create([
            'id_unit_induk' => $request->id_unit_induk,
            'id_pelaksana' => $request->id_pelaksana,
            'id_layanan' => $request->id_layanan,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => $request->roles
        ]);

        return redirect()->route('user.index')->with('success', 'User successfully created');
        // dd($data);
    }

    public function edit($id)
    {
        $unitinduks = DB::table('unitinduks')->get();
        $unitpelaksanas = DB::table('unitpelaksanas')->get();
        $unitlayanans = DB::table('unitlayanans')->get();
        $user = \App\Models\User::findOrFail($id);
        return view('pages.users.edit', compact('user','unitinduks','unitpelaksanas','unitlayanans'));
    }

    public function update(Request $request, $id)
    {
        if($request->password != ''){
            DB::table('users')->where('id',$id)->update([
                'id_unit_induk' => $request->id_unit_induk,
                'id_pelaksana' => $request->id_pelaksana,
                'id_layanan' => $request->id_layanan,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'roles' => $request->roles
            ]);
        }else{
            DB::table('users')->where('id',$id)->update([
                'id_unit_induk' => $request->id_unit_induk,
                'id_pelaksana' => $request->id_pelaksana,
                'id_layanan' => $request->id_layanan,
                'name' => $request->name,
                'email' => $request->email,
                'roles' => $request->roles
            ]);
        }

        return redirect()->route('user.index')->with('success', 'User successfully updated');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User successfully deleted');
    }
}
