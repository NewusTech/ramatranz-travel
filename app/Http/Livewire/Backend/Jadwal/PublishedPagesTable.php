<?php

namespace App\Http\Livewire\Backend\Jadwal;

use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PublishedPagesTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Asal', 'asal')->searchable()->format(function ($value, $column, $row) {
                return $value . "
                <div class='table-links'>
                <a taret='_blank' href='" . route('detail-jadwal', $row->id) . "'>View</a>
                <div class='bullet'></div>
                <a href='" . route('edit-jadwal', $row->id) . "'>Edit</a>
                <div class='bullet'></div>
                <a href='#' class='text-danger btnAction' role='button' data-action='confirm' data-id='$row->id' data-force='false'>Hapus</a>
              </div>
              ";
            })->asHtml(),

            Column::make('Tujuan', 'tujuan')->format(function ($value, $column) {
                return "<span class='badge badge-primary'>$value</span>";
            })->asHtml(),
        ];
    }

    public function query(): Builder
    {
        return Jadwal::query();
    }
}
