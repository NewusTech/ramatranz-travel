<?php

namespace App\Http\Livewire\Backend\SearchConsole;

use App\Models\SearchConsole;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PublishedSearch extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')->searchable()->format(function ($value, $column, $row) {
                return "
                $value
                <div class='table-links'>
                              <a taret='_blank' href='" . route('detail-search-console', $row->id) . "'>View</a>
                              <div class='bullet'></div>
                              <a href='" . route('edit-search-console', $row->id) . "'>Edit</a>
                            </div>
                            ";
            })->asHtml()
        ];
    }

    public function query(): Builder
    {
        return SearchConsole::query();
    }
}
