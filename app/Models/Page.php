<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table = "pages";
    protected $primaryKey = "id";
    // protected $guarded = [];
    protected $fillable = [
        'author_id',
        'title',
        'slug',
        'content',
        'meta_desc',
        'seo_title',
        'short_description',
        'posted_ad',
        'media'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id')->withDefault();
    }
}
