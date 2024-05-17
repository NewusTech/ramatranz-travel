<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "seo_tools";

    protected $fillable = [
        'id',
        'site_title',
        'home_title',
        'site_description',
        'keywords',
        'created_at',
        'deleted_at',
        'updated_at'
    ];


}
