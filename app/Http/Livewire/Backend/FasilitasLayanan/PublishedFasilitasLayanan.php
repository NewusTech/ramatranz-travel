<?php

namespace App\Http\Livewire\Backend\FasilitasLayanan;

use App\Models\FasilitasLayanan;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Support\Str;

class PublishedFasilitasLayanan extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('Nama Fasilitas', 'nama_fasilitas')->searchable()->format(function ($value, $column, $row) {
                return "
                $value
                <div class='table-links'>
                              <a taret='_blank' href='" . route('detail-fasilitas-layanan', $row->id) . "'>View</a>
                              <div class='bullet'></div>
                              <a href='" . route('edit-fasilitas-layanan', $row->id) . "'>Edit</a>
                              <div class='bullet'></div>
                              <a href='#' class='text-danger btnAction' role='button' data-action='confirm' data-id='$row->id' data-force='false'>Hapus</a>
                            </div>
                            ";
            })->asHtml(),
            Column::make('Deskripsi', 'description')->format(function ($value, $column) {
                return Str::limit($value, 30, '...');
            })->asHtml(),

        ];
    }

    public function query(): Builder
    {
        return FasilitasLayanan::query();
    }
}
