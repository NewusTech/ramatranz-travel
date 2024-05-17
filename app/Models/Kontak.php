<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;
    protected $table = "kontaks";
    protected $primaryKey = "id";
    // protected $guarded = [];

    protected $fillable = [
        'alamat',
        'lat',
        'lng',
        'email',
        'phone_tr_1',
        'phone_tr_2',
        'phone_cr_1',
        'phone_cr_2',
        'wa',
    ];
}
