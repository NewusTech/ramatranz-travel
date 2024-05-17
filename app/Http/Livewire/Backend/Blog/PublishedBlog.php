<?php

namespace App\Http\Livewire\Backend\Blog;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PublishedBlog extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Judul', 'title')->searchable()->format(function ($value, $column, $row) {
                return "
                $value
                <div class='table-links'>
                              <a taret='_blank' href='" . route('detail-blog', $row->slug) . "'>View</a>
                              <div class='bullet'></div>
                              <a href='" . route('edit-blog', $row->id) . "'>Edit</a>
                              <div class='bullet'></div>
                              <a href='#' class='text-danger btnAction' role='button' data-action='confirm' data-id='$row->id' data-force='false'>Hapus</a>
                            </div>
                            ";
            })->asHtml(),
            Column::make('Status', 'status')->format(function ($value, $column) {
                return "<span class='badge badge-primary'>$value</span>";
            })->asHtml()
        ];
    }

    public function query(): Builder
    {
        return Blog::query();
    }
}
