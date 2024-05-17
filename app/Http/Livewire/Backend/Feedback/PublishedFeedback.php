<?php

namespace App\Http\Livewire\Backend\Feedback;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Support\Str;

class PublishedFeedback extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('Nama', 'title')->searchable()->format(function ($value, $column, $row) {
                return "
                $value
                <div class='table-links'>
                              <a taret='_blank' href='" . route('detail-feedback', $row->id) . "'>View</a>
                              <div class='bullet'></div>
                              <a href='" . route('edit-feedback', $row->id) . "'>Edit</a>
                              <div class='bullet'></div>
                              <a href='#' class='text-danger btnAction' role='button' data-action='confirm' data-id='$row->id' data-force='false'>Hapus</a>
                            </div>
                            ";
            })->asHtml(),
            Column::make('Penilaian', 'desc')->format(function ($value, $column) {
                return Str::limit($value, 30, '...');
            })->asHtml(),
            Column::make('Rating', 'rating')->format(function ($value, $column) {
                return Str::limit($value, 30, '...');
            })->asHtml(),
            Column::make('Telepon', 'no_hp')->searchable()->format(function ($value, $column) {
                return Str::limit($value, 15);
            })->asHtml(), 
        ];
    }

    public function query(): Builder
    {
        return Feedback::query()->latest();
    }
}
