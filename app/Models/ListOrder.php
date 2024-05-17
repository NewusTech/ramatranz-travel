<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListOrder extends Model
{
    use HasFactory;
    protected $table = 'list_order';
    protected $primaryKey = "id";

    protected $fillable = [
        'name', 'telp', 'date', 'time', 'rute', 'numberorder', 'location'
    ];

    public $timestamps = true;
}
