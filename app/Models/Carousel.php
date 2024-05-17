<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carousel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "carousels";
    protected $primaryKey = "id";
    // protected $guarded = [];

    protected $fillable = [
        'image',
        'title_top',
        'title',
        'title_bot',
    ];
}
