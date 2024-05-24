<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Authenticatable
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
        'idstatusjabatan',
    ];

    protected $hidden = ['password', 'remember_token'];


    public function DataPegawai($id)
    {
        return $this->where('id', $id)->get();
    }
}
