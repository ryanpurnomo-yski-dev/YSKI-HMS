<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriMasalah extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = 'trouble_categories';
    public $timestamps = false;
    protected $fillable = [
        'kategori',
        'subkategori',
        'icon',
    ];
}
