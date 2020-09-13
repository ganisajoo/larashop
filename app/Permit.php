<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    protected $table = ['permits'];
    protected $fillable = [
        'nama_permit',
        'purpose_work',
        'tipe_akses',
        'time_akses'
        
    ];
}
