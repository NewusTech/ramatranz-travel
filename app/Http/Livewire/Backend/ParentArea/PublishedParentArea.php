<?php

namespace App\Http\Livewire\Backend\ParentArea;

use App\Models\ParentArea;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PublishedParentArea extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('Nama Provinsi', 'nama_provinsi')->searchable()->format(function ($value, $column, $row) {
                return "
                $value
                <div class='table-links'>
                              <a taret='_blank' href='" . route('detail-parent-area', $row->slug) . "'>View</a>
                              <div class='bullet'></div>
                              <a href='" . route('edit-parent-area', $row->id) . "'>Edit</a>
                              <div class='bullet'></div>
                              <a href='#' class='text-danger btnAction' role='button' data-action='confirm' data-id='$row->id' data-force='false'>Hapus</a>
                            </div>
                            ";
            })->asHtml(),
            Column::make('Slug', 'slug')->format(function ($value, $column) {
                return "<span class='badge badge-primary'>$value</span>";
            })->asHtml(),

        ];
    }

    public function query(): Builder
    {
        return ParentArea::query();
    }
}
