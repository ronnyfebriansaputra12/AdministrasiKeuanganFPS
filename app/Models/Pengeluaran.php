<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function pemasukan()
    {
        return $this->belongsTo(Pemasukan::class, 'id_pemasukan', 'id');
    }


}


