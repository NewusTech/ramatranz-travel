<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasLayanan extends Model
{
    use HasFactory;
    protected $table = "fasilitas_layanans";
    protected $primaryKey = "id";
    // protected $guarded = [];

    protected $fillable = [
        'nama_fasilitas',
        'description',
        'image',

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public function layanan()
    {
        return $this->belongsToMany(Layanan::class, 'fasilitas_tags', 'layanans_id', 'fasilitas_id');
    }
}
