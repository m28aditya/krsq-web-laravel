<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function matkul_detail()
    {
        return $this->hasMany(MatkulDetail::class,'id_matkul','id');
    }
}