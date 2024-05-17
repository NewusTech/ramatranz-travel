<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLayanan extends Model
{
    use HasFactory;

    protected $table = "jenis_layanans";
    protected $primaryKey = "id";
    // protected $guarded = [];

    protected $fillable = [
        'title',
        'slug',
        'media',
        'content'
    ];

    /**
     * Get the news associated with the Jenis Layanan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function layanan()
    {
        return $this->hasOne(Layanan::class, 'jenis_layanan_id', 'id');
    }
}
