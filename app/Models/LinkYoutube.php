<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkYoutube extends Model
{
    use HasFactory;
    protected $table = "link_youtubes";
    protected $primaryKey = "id";

    protected $fillable = [
        'link_youtube',
    ];
}
