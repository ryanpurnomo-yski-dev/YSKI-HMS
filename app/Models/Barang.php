<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    protected $table = 'barang';

    protected $fillable = [
        'kode_barang',
        'kategori_barang',
        'nama_barang',
        'merk_barang',
        'kuantitas_barang'
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(BarangTransaction::class, 'kode_barang', 'kode_barang');
    }
}
