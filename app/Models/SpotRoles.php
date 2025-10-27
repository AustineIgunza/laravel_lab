<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpotRoles extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'roleId';
    public $timestamps = true;

    protected $fillable = ['roleName'];
}
