<?php

namespace App\Http\Livewire\Backend\Kontak;

use App\Models\Kontak;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PublishedKontak extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('Email', 'email')->searchable()->format(function ($value, $column, $row) {
                return "
                $value
                <div class='table-links'>
                              <a taret='_blank' href='" . route('detail-kontak', $row->id) . "'>View</a>
                              <div class='bullet'></div>
                              <a href='" . route('edit-kontak', $row->id) . "'>Edit</a>
                              <div class='bullet'></div>
                              <a href='#' class='text-danger btnAction' role='button' data-action='confirm' data-id='$row->id' data-force='false'>Hapus</a>
                            </div>
                            ";
            })->asHtml(),
            Column::make('Telepon Travel 1', 'phone_tr_1')->format(function ($value, $column) {
                return $value;
            })->asHtml(),

        ];
    }

    public function query(): Builder
    {
        return Kontak::query();
    }
}
