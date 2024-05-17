<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = "jadwal";
    protected $primaryKey = "id";
    // protected $guarded = [];
    protected $fillable = [
        'asal',
        'tujuan',
        'mulai_jemput',
        'harga',
    ];

    public $timestamps = false;
}
