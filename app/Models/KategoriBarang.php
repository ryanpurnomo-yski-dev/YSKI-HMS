<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriBarang extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = 'item_categories';
    public $timestamps = false;
    protected $fillable = [
        'kategori'
    ];
}
