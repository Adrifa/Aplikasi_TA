<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingJam extends Model
{
    use HasFactory;
    protected $table = 'settingjams';
    protected $fillable = [
        'namasetting',
        'jammasukawal',
        'jammasukakhir',
        'jamkeluarawal',
        'jamkeluarakhir',
    ];
}
