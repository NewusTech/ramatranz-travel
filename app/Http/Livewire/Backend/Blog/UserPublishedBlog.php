<?php

namespace App\Http\Livewire\Backend\Blog;

use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UserPublishedBlog extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Judul', 'title')->searchable()->format(function ($value, $column, $row) {
                $imageSrc = Storage::disk('s3')->url($row->image);

                return "                
                <div style='display: flex; align-items: center;' class='table-links'>
                    <img src='$imageSrc' alt='image' class='blog-image' style='margin-right: 10px;'>
                    <div>
                        <a target='_blank' href='" . route('detail-blog.blogId', $row->slug) . "' style='color: #2450A6; font-weight: 600;'>$value</a>
                        <div class='bullet'></div>
                        <p>" . Str::limit($row->excerpt, 250, '...') . "</p>
                    </div>
                </div>";
            })->asHtml()
        ];
    }

    public function query(): Builder
    {
        return Blog::query();
    }
}
