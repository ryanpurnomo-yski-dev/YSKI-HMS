<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangTransaction;;

class BarangTransactionController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $user = json_decode($request->input('user'), true);
        $userId = $user['id'];
        $BarangTransaction = new BarangTransaction();
        $BarangTransaction->user_id = $userId; 
        $BarangTransaction->kode_barang = $request->input('kode_barang');
        $BarangTransaction->kuantitas_barang = $request->input('kuantitas_barang');
        $BarangTransaction->jenis_transaksi = "out";

        $BarangTransaction->save();

        return redirect()->route('items.requests');
    }
}
