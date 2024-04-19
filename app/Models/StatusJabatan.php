<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusJabatan extends Model
{
    use HasFactory;
    protected $table = 'statusjabatan';
    protected $fillable = [
        'namastatusjabatan',
        'gaji',
    ];
}
