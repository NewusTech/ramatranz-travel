<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentArea extends Model
{
    use HasFactory;

    protected $table = "parent_areas";
    protected $primaryKey = "id";
    // protected $guarded = [];

    protected $fillable = [
        'nama_provinsi',
        'slug',
        'image'
    ];

    /**
     * Get the news associated with the Jenis Layanan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function areas()
    {
        return $this->hasOne(Area::class, 'parent_areas_id', 'id');
    }
}
