<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddUser extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'roleId',
    ];
}
