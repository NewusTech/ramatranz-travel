<?php

namespace App\Http\Livewire\Backend\Area;

use App\Models\Area;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PublishedArea extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('Nama Kota/Kabupaten', 'kota_kab')->searchable()->format(function ($value, $column, $row) {
                return "
                $value
                <div class='table-links'>
                              <a taret='_blank' href='" . route('detail-area', $row->id) . "'>View</a>
                              <div class='bullet'></div>
                              <a href='" . route('edit-area', $row->id) . "'>Edit</a>
                              <div class='bullet'></div>
                              <a href='#' class='text-danger btnAction' role='button' data-action='confirm' data-id='$row->id' data-force='false'>Hapus</a>
                            </div>
                            ";
            })->asHtml(),
            Column::make('Provinsi', 'parent_areas_id')->format(function ($value, $column, $row) {
                return $row->parents->nama_provinsi;
            })->asHtml()
        ];
    }

    public function query(): Builder
    {
        return Area::query();
    }
}
