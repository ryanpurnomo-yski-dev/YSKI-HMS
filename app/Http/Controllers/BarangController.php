<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function store(Request $request)
    {
        /*
        $request->validate([

        ]);
        */

        $Barang = new Barang();
        $Barang->kode_barang = $request->query('kode_barang');
        $Barang->kategori_barang = $request->query('kategori_barang');
        $Barang->nama_barang = $request->query('nama_barang');
        $Barang->merk_barang = $request->query('merk_barang');
        $Barang->save();

        return redirect()->route('');
    }
}