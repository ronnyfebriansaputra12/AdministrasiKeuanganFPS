<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Pengeluaran.index',[
            'datas' => Pengeluaran::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Pengeluaran.create',[
            'datas' => Pemasukan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $validate = $request->validate([
            'id_pemasukan' => 'required|numeric|min:1',
            'pembayaran_wasit' => 'required|numeric|min:1',
            'laundry' => 'required|numeric|min:1',
            'fotografer' => 'required|numeric|min:1',
            'korlap' => 'required|numeric|min:1',
            'admin' => 'required|numeric|min:1',
            'air_mineral' => 'required|numeric|min:1',
            'konten_kreator' => 'required|numeric|min:1',
            'kid_man' => 'required|numeric|min:1',
        ]);

        Pengeluaran::create($validate);
        
        Alert::success('Insert Data Berhasil');
        return redirect('/pengeluaran');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        //
    }
}
