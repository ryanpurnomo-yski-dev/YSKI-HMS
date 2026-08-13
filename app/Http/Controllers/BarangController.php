<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangTransaction;

class BarangController extends Controller
{
    public function store(Request $request)
    {
        $Barang = Barang::create($request->only([
            'kode_barang',
            'kategori_barang',
            'nama_barang',
            'merk_barang',
            'kuantitas_barang',
        ]));

        $user = json_decode($request->input('user'), true);
        $userId = $user['id'];

        BarangTransaction::create(array_merge(
            ['user_id' => $userId],
            $Barang->only([
                'kode_barang',
                'kuantitas_barang',
            ]),
            ['jenis_transaksi' => 'in']
        ));

        return redirect()->route('items');
    }
}