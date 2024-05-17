<?php

namespace App\Http\Livewire\Backend\Tag;

use App\Models\TagManager;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PublishedTag extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Source', 'source')->searchable()->format(function ($value, $column, $row) {
                return "
                $value
                <div class='table-links'>
                              <a taret='_blank' href='" . route('detail-tag', $row->id) . "'>View</a>
                              <div class='bullet'></div>
                              <a href='" . route('edit-tag', $row->id) . "'>Edit</a>
                            </div>
                            ";
            })->asHtml(),
            Column::make('Code', 'codeTag')->format(function ($value, $column, $row) {
                return "<span>$row->codeTag</span>";
            })->asHtml()
        ];
    }

    public function query(): Builder
    {
        return TagManager::query();
    }
}
