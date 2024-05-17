<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $table = "areas";
    protected $primaryKey = "id";
    // protected $guarded = [];

    protected $fillable = [
        'parent_areas_id',
        'kota_kab',
        'alamat',
        'lat',
        'lng',
        'isHQ',
        'nama_phone',
        'phone_1',
        'phone_2',
        'wa',

    ];

    /**
     * Get the jenisLayanan that owns the Layanan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parents()
    {
        return $this->belongsTo(ParentArea::class, 'parent_areas_id', 'id');
    }
}
