<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriMasalah;

class KategoriController extends Controller
{
    public function store(Request $request)
    {
        $Kategori = new KategoriMasalah();
        $Kategori->kategori = $request->input('kategori');
        $Kategori->subkategori = $request->input('subkategori');
        $Kategori->icon = $request->input('icon');
        $Kategori->save();
    }
}
