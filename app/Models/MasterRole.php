<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterRole extends Model
{
    protected $table = 'master_roles';

    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
