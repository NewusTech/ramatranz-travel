<?php

namespace App\Http\Livewire\Backend\Unggulan;

use App\Models\Unggulan;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Support\Str;

class PublishedUnggulan extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('Title', 'title')->searchable()->format(function ($value, $column, $row) {
                return "
                $value
                <div class='table-links'>
                              <a taret='_blank' href='" . route('detail-unggulan', $row->id) . "'>View</a>
                              <div class='bullet'></div>
                              <a href='" . route('edit-unggulan', $row->id) . "'>Edit</a>
                              <div class='bullet'></div>
                              <a href='#' class='text-danger btnAction' role='button' data-action='confirm' data-id='$row->id' data-force='false'>Hapus</a>
                            </div>
                            ";
            })->asHtml(),
            Column::make('Keterangan', 'desc')->format(function ($value, $column) {
                return Str::limit($value, 30, '...');
            })->asHtml(),

        ];
    }

    public function query(): Builder
    {
        return Unggulan::query();
    }
}
