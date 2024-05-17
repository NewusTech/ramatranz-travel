<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unggulan extends Model
{
    use HasFactory;
    protected $table = "unggulans";
    protected $primaryKey = "id";

    protected $fillable = [
        'icon',
        'title',
        'desc',
    ];
}
