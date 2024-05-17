<?php

namespace App\Http\Livewire\Backend\Faq;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Support\Str;

class PublishedFaq extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('Question', 'question')->searchable()->format(function ($value, $column, $row) {
                return "
                $value
                <div class='table-links'>
                              <a taret='_blank' href='" . route('detail-faq', $row->id) . "'>View</a>
                              <div class='bullet'></div>
                              <a href='" . route('edit-faq', $row->id) . "'>Edit</a>
                              <div class='bullet'></div>
                              <a href='#' class='text-danger btnAction' role='button' data-action='confirm' data-id='$row->id' data-force='false'>Hapus</a>
                            </div>
                            ";
            })->asHtml(),
            Column::make('Answer', 'answer')->format(function ($value, $column) {
                return Str::limit($value, 30, '...');
            })->asHtml(),

        ];
    }

    public function query(): Builder
    {
        return Faq::query();
    }
}
