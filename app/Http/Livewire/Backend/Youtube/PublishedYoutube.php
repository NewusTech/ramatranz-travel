<?php

namespace App\Http\Livewire\Backend\Youtube;

use App\Models\LinkYoutube;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PublishedYoutube extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Link Youtube', 'link_youtube')->format(function ($value, $column, $row) {
                return $value . "
                <div class='table-links'>
                <a taret='_blank' href='" . route('detail-youtube', $row->id) . "'>View</a>
                <div class='bullet'></div>
                <a href='" . route('edit-youtube', $row->id) . "'>Edit</a>
                <div class='bullet'></div>
                <a href='#' class='text-danger btnAction' role='button' data-action='confirm' data-id='$row->id' data-force='false'>Hapus</a>
              </div>
              ";
            })->asHtml(),
        ];
    }

    public function query(): Builder
    {
        return LinkYoutube::query();
    }
}
