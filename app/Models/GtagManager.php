<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GtagManager extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "gtagmanager";

    protected $fillable = [
        'id',
        'source',
        'code',
        'created_at',
        'deleted_at',
        'updated_at'
    ];


}
