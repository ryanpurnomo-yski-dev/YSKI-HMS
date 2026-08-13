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

    public function syncToApproval()
    {
        $existingApproval = $this->approvals()->first();

        if ($existingApproval) {
            $existingApproval->update([
                'status' => $this->status,
                'action' => $this->action,
            ]);
            return $existingApproval;
        }

        return $this->approvals()->create([
            'status'    => $this->status ?? 'Pending',
            'action'    => $this->action ?? null,
            'note'      => null,
        ]);
    }

    public function category()
    {
        return $this->belongsTo(KategoriMasalah::class, 'kategori_id');
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