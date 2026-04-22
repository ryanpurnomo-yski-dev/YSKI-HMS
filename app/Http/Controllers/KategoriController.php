<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function store(Request $request)
    {
        $Kategori = new Kategori();
        $Kategori->kategori = $request('');
        $Kategori->subkategori = $request('');
        $Kategori->icon = $request('');
        $Kategori->save();
    }
}
