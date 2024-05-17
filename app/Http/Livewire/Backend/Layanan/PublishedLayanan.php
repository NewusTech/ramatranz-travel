<?php

namespace App\Http\Livewire\Backend\Layanan;

use App\Models\Layanan;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PublishedLayanan extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('Rute', 'title')->searchable()->format(function ($value, $column, $row) {
                return "
                $value
                <div class='table-links'>
                              <a taret='_blank' href='" . route('detail-layanan', $row->slug) . "'>View</a>
                              <div class='bullet'></div>
                              <a href='" . route('edit-layanan', $row->id) . "'>Edit</a>
                              <div class='bullet'></div>
                              <a href='#' class='text-danger btnAction' role='button' data-action='confirm' data-id='$row->id' data-force='false'>Hapus</a>
                            </div>
                            ";
            })->asHtml(),
            Column::make('Jenis Layanan', 'jenis_layanan_id')->searchable()->format(function ($value, $column, $row) {
                return $row->jenisLayanan->title;
            })->asHtml()
        ];
    }

    public function query(): Builder
    {
        return Layanan::query()->latest();
    }
}
