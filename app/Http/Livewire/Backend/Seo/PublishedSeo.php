<?php

namespace App\Http\Livewire\Backend\Seo;

use App\Models\Seo;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PublishedSeo extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Site Title', 'site_title')->searchable()->format(function ($value, $column, $row) {
                return "
                $value
                <div class='table-links'>
                              <a taret='_blank' href='" . route('detail-seo', $row->id) . "'>View</a>
                              <div class='bullet'></div>
                              <a href='" . route('edit-seo', $row->id) . "'>Edit</a>
                            </div>
                            ";
            })->asHtml()
        ];
    }

    public function query(): Builder
    {
        return Seo::query();
    }
}
