<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{

    use HasFactory;

    protected $fillable = [
        'namapegawai',
        'hp',
        'alamat',
        'tgllahir',
        'rfid',
        'email',
        'password',
        'iddepartement',
    ];
}
