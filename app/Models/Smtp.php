<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smtp extends Model
{
    use HasFactory;

    protected $fillable = [
        "driver",
        "host",
        "port",
        "encryption",
        "username",
        "password",
        "sender_name",
        "sender_email",
    ];
}
