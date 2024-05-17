<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TagManager extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "tag_manager";

    protected $fillable = [
        'id',
        'source',
        'codeTag',
        'created_at',
        'deleted_at',
        'updated_at'
    ];


}
