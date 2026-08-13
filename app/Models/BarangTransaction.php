<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangTransaction extends Model
{
    protected $table = 'barang_transactions';

    protected $fillable = [
        'kode_barang',
        'kuantitas_barang',
        'jenis_transaksi',
        'user_id',
    ];

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
    }
}
