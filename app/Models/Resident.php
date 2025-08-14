<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $table = 'residents';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nik',
        'name',
        'gender',
        'birth_date',
        'birth_place',
        'address',
        'religion',
        'marital_status',
        'occupation',
        'phone',
        'status'
    ];
}
