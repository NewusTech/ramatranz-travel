<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SearchConsole extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "search_console";

    protected $fillable = [
        'id',
        'name',
        'content',
        'created_at',
        'deleted_at',
        'updated_at'
    ];


}
