<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = 'tickets';
    protected $fillable = [
        'no_ticket',
        'kategori_id',
        'user_id',
        'keterangan',
        'pictures',
        'tanggal',
        'status',
        'action'
    ];

    public function category()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }   

    public function approvals()
    {
        return $this->morphMany(
            Approvals::class, 
            'approvable', 
            'tipe_kategori_approval', 
            'id_kategori_approval',
            'no_ticket'
        );
    }
}