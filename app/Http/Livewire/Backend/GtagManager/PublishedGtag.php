<?php

namespace App\Http\Livewire\Backend\GtagManager;

use App\Models\GtagManager;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PublishedGtag extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Source', 'source')->searchable()->format(function ($value, $column, $row) {
                return "
                $value
                <div class='table-links'>
                              <a taret='_blank' href='" . route('detail-gtagmanager', $row->id) . "'>View</a>
                              <div class='bullet'></div>
                              <a href='" . route('edit-gtagmanager', $row->id) . "'>Edit</a>
                            </div>
                            ";
            })->asHtml(),
            Column::make('Code', 'code')->format(function ($value, $column, $row) {
                return "<span>$row->code</span>";
            })->asHtml()
        ];
    }

    public function query(): Builder
    {
        return GtagManager::query();
    }
}
