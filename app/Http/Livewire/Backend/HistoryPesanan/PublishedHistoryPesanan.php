<?php

namespace App\Http\Livewire\Backend\HistoryPesanan;

use App\Models\ListOrder;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PublishedHistoryPesanan extends DataTableComponent
{   
    public $startDate;
    public $endDate;

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')->searchable()->format(function ($value, $column, $row) {
                return "
                $value
                    <div class='table-links'>
                        <a taret='_blank' href='" . route('detail-history-pesanan', $row->id) . "'>View</a>
                        <div class='bullet'></div>
                        <a href='#' class='text-danger btnAction' role='button' data-action='confirm' data-id='$row->id' data-force='false'>Hapus</a>
                    </div>
                ";
            })->asHtml(),
            Column::make('Rute', 'rute')->searchable()->format(function ($value, $column) {
                return Str::limit($value, 30, '...');
            })->asHtml(), 
            Column::make('Tanggal', 'date')->format(function ($value, $column) {
                return Carbon::parse($value)->format('d M Y');
            })->asHtml(), 
            Column::make('Telepon', 'telp')->searchable()->format(function ($value, $column) {
                return Str::limit($value, 15);
            })->asHtml(), 
        ];
    }    

    public function filters(): array
    {
        return [
            'startDate' => Filter::make('Start Date')->date(),
            'endDate' => Filter::make('End Date')->date(),
        ];
    }

    public function query(): Builder
    {     
        $query = ListOrder::query();

        if ($this->filters['startDate']) {
            $startDate = Carbon::parse($this->filters['startDate'])->format('Y-m-d');
            $query->whereDate('date', '>=', $startDate);
        }
    
        if ($this->filters['endDate']) {
            $endDate = Carbon::parse($this->filters['endDate'])->format('Y-m-d');
            $query->whereDate('date', '<=', $endDate);
        }

        return $query;
    }    

}
