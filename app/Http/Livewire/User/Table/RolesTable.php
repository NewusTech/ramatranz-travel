<?php

namespace App\Http\Livewire\User\Table;

use App\Models\Role;
use App\Models\RoleGroup;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class RolesTable extends DataTableComponent
{

    protected $listeners = ['refresh'];

    // public bool $columnSelect = true;

    public function refresh(){
        return $this->refresh;
    }


    public function columns(): array
    {
        return [
            Column::make('Role','name')->sortable()->searchable(),
            
            Column::make(__('Action'), 'name')->format(function($value, $column, $row){
                $button = " <a class='btn btn-primary btnAction' role='button' data-action='getPermissions'  data-id='$row->id' 
                                    ><i class='fas fa-sliders-h'></i></a>";
                
                return $button;
               
            })->asHtml(),
        ];
    }

    public function query(): Builder
    {
        return Role::query();
    }

   
}
