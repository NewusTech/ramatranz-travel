<?php

namespace App\Http\Livewire\Backend\Page;

use App\Models\Page;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PublishedPagesTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Title', 'title')->format(function ($value, $column, $row) {
                return $value . "
                <div class='table-links'>
                <a taret='_blank' href='" . route('detail-page', $row->slug) . "'>View</a>
                <div class='bullet'></div>
                <a href='" . route('edit-page', $row->id) . "'>Edit</a>
                <div class='bullet'></div>
                <a href='#' class='text-danger btnAction' role='button' data-action='confirm' data-id='$row->id' data-force='false'>Hapus</a>
              </div>
              ";
            })->asHtml(),
        ];
    }

    public function query(): Builder
    {
        return Page::query();
    }
}
