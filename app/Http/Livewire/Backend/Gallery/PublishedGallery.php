<?php

namespace App\Http\Livewire\Backend\Gallery;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PublishedGallery extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('Title', 'title')->searchable()->format(function ($value, $column, $row) {
                return "
                $value
                
                <div class='table-links'>
                              <a taret='_blank' href='" . route('detail-gallery', $row->id) . "'>View</a>
                              <div class='bullet'></div>
                              <a href='" . route('edit-gallery', $row->id) . "'>Edit</a>
                              <div class='bullet'></div>
                              <a href='#' class='text-danger btnAction' role='button' data-action='confirm' data-id='$row->id' data-force='false'>Hapus</a>
                            </div>
                            ";
            })->asHtml(),
            Column::make('Gambar', 'image')->format(function ($value, $column) {
                $imageUrl = Storage::disk('s3')->url($value);                
                return "<img src='" . $imageUrl . "' alt='' class='img-thumbnail' width='70'>";
            })->asHtml(),

        ];
    }

    public function query(): Builder
    {
        return Gallery::query()->latest();
    }
}
