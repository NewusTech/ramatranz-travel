<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $table = "layanans";
    protected $primaryKey = "id";
    // protected $guarded = [];

    protected $fillable = [
        'jenis_layanan_id',
        'title',
        'slug',
        'intro',
        'content',
        'image',
        'price',
        'asal',
        'tujuan',
        'wa',
        'jenis_carter',
        'isNegotiatable',
        'jadwal_berangkat',
        'rute_berangkat',
        'tgl_berangkat',
        'jam_pagi',
        'jam_siang',
        'jam_sore',
        'jam_malam',
    ];

    /**
     * Get the jenisLayanan that owns the Layanan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jenisLayanan()
    {
        return $this->belongsTo(JenisLayanan::class, 'jenis_layanan_id', 'id');
    }

    /**
     * The tag that belong to the News
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function fasilitas()
    {
        return $this->belongsToMany(FasilitasLayanan::class, 'fasilitas_tags', 'layanans_id', 'fasilitas_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }
}
