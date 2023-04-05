<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;


class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('Pemasukan.index',[
            'datas' => Pemasukan::all()
        ]);
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
        $validate = $request->validate([
            'jumlah_pemasukan' => 'required|numeric|min:1',
        ]);

        $result = Pemasukan::create($validate);

        if(!$result){
            Alert::error('Insert Data Gagal');
            return redirect('/pemasukan');
        }
        
        Alert::success('Insert Data Berhasil');
        return redirect('/pemasukan');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemasukan $pemasukan)
    {
        $pemasukan = Pemasukan::find($pemasukan->id);
        return response()->json([
            'status' => 200,
            'pemasukan' => $pemasukan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemasukan $pemasukan)
    {
        $pemasukan = Pemasukan::find($pemasukan->id);
        return response()->json([
            'status' => 200,
            'pemasukan' => $pemasukan
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemasukan $pemasukan)
    {
        $pemasukan_id = $request->input('id');
        $pemasukan = Pemasukan::find($pemasukan_id);
        $pemasukan->jumlah_pemasukan = $request->input('jumlah_pemasukan');
        $pemasukan->save();

        Alert::success('Update', 'Data Berhasil di Update');
        return redirect('/pemasukan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemasukan $pemasukan)
    {   
        Pemasukan::destroy($pemasukan->id);
        return redirect('/pemasukan')->with('pesan_hapus','Data Berhasil di Hapus');
    }
}
