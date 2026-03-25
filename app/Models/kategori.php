<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $table = 'categories';
    public $timestamps = false;
    protected $fillable = [
        'kategori',
        'icon',
    ];
}
