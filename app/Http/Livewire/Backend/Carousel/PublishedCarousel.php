<?php

namespace App\Http\Livewire\Backend\Carousel;

use App\Models\Carousel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PublishedCarousel extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('Gambar', 'image')->searchable()->format(function ($value, $column, $row) {
                $imageUrl = Storage::disk('s3')->url($value);
                return "
                <img src='" . $imageUrl . "' alt='' class='img-thumbnail' width='150'>
                
                <div class='table-links'>
                              <a taret='_blank' href='" . route('detail-carousel', $row->id) . "'>View</a>
                              <div class='bullet'></div>
                              <a href='" . route('edit-carousel', $row->id) . "'>Edit</a>
                              <div class='bullet'></div>
                              <a href='#' class='text-danger btnAction' role='button' data-action='confirm' data-id='$row->id' data-force='false'>Hapus</a>
                            </div>
                            ";
            })->asHtml(),

        ];
    }

    public function query(): Builder
    {
        return Carousel::query()->latest();
    }
}
