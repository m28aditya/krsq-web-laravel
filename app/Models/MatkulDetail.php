<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatkulDetail extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'npm', 'npm');
    }
    public function matkul()
    {
        return $this->belongsTo(Matkul::class,'id_matkul','id');
    }
}