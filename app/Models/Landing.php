<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    use HasFactory;
    protected $table = "landing";
    protected $primaryKey = "id";
    // protected $guarded = [];
    protected $fillable = [
        'title',
        'sub_title',
        'desc'
    ];
}
