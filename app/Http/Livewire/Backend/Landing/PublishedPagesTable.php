<?php

namespace App\Http\Livewire\Backend\Landing;

use App\Models\Landing;
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
                <a taret='_blank' href='" . route('detail-landing', $row->id) . "'>View</a>
                <div class='bullet'></div>
                <a href='" . route('edit-landing', $row->id) . "'>Edit</a>
              </div>
              ";
            })->asHtml(),
        ];
    }

    public function query(): Builder
    {
        return Landing::query();
    }
}
