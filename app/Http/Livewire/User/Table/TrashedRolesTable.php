<?php

namespace App\Http\Livewire\User\Table;

use App\Models\Role;
use App\Models\RoleGroup;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class TrashedRolesTable extends DataTableComponent
{

    protected $listeners = ['refresh'];

    // public bool $columnSelect = true;

    public function refresh(){
        return $this->refresh;
    }


    public function columns(): array
    {
        return [
            Column::make('Roles','name')->sortable()->searchable(),
            Column::make(__('Action'), 'name')->format(function($value, $column, $row){
                $button = "
                            <div class='dropdown d-inline mr-2'>
                                                    <button class='btn btn-primary ' type='button'
                                                        id='dropdownMenuButton' data-toggle='dropdown'
                                                        aria-haspopup='true' aria-expanded='false'>
                                                        <i class='fa fa-ellipsis-v' aria-hidden='true'></i>
                                                    </button>
                                                    <div class='dropdown-menu' x-placement='top-start'
                                                        style='position: absolute; transform: translate3d(0px, -10px, 0px); top: 0px; left: 0px; will-change: transform;'>";
                if(auth()->user()->can('roles.edit')):
                            $button .=" <a class='dropdown-item btnAction' role='button' data-action='restore'  data-id='$row->id' 
                                    >Restore</a>";
                                            endif;
                if(auth()->user()->can('roles.delete')):
                            $button .="<a class='dropdown-item btnAction' role='button' data-force='true' data-action='confirm' data-id='$row->id' data-force='false'
                                    >Delete Permanently</a>";
                endif;
                $button .="</div></div>";
                return $button;
               
            })->asHtml(),
        ];
    }

    public function query(): Builder
    {
        return Role::query()->onlyTrashed();
    }

}
