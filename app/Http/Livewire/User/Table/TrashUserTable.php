<?php

namespace App\Http\Livewire\User\Table;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class TrashUserTable extends DataTableComponent
{
    protected $listeners = ['refresh'];

    public bool $columnSelect = true;

    public array $bulkActions = [
        'deleteSelected' => 'Delete',
        'restoreSelected' => 'Restore',
    ];

    public function refresh(){
        return $this->refresh;
    }
    
    public function columns(): array
    {
        return [
           Column::make(__('Name'), 'name')->sortable()->searchable(),
            Column::make('Email', 'email')->sortable()->searchable(),
            Column::make('Peran', 'role')->sortable(),
            Column::make('Dibuat','created_at'),
            Column::make(__('Action'), 'roles')->format(function($value, $column, $row){
                $button = "<div class='dropdown d-inline mr-2'>
                            <button class='btn btn-primary ' type='button'
                                id='dropdownMenuButton' data-toggle='dropdown'
                                aria-haspopup='true' aria-expanded='false'>
                                <i class='fa fa-ellipsis-v' aria-hidden='true'></i>
                            </button>
                            <div class='dropdown-menu' x-placement='top-start'
                                style='position: absolute; transform: translate3d(0px, -10px, 0px); top: 0px; left: 0px; will-change: transform;'>";
                        if(auth()->user()->can('users.edit')):
                            // $button .=" <a class='dropdown-item btnAction' role='button' data-action='open' data-mode='update' data-id='$row->id' 
                            //         >Edit</a>";
                            $button .=" <a class='dropdown-item btnAction' role='button' data-action='restore' data-id='$row->id' 
                                    >Restore</a>";
                        endif;
                        if(auth()->user()->can('users.delete')):
                            $button .="<a class='dropdown-item btnAction' role='button' data-action='confirm' data-force='true' data-id='$row->id' data-force='false'
                                    >Delete Permanent</a>";
                        endif;
                            $button .="</div></div>";
                return $button;
                
               
            })->asHtml(),
        ];
    }

    public function query(): Builder
    {
       return  User::query()->onlyTrashed()->selectRaw('users.id as id, 
                                          users.name,
                                          users.email as email, 
                                          users.created_at as created_at, 
                                          roles.name as role')
                        ->join('model_has_roles','model_has_roles.model_id','=','users.id')
                        ->join('roles','roles.id','=','model_has_roles.role_id')
                        ->groupBy('id')
                        ->whereNotIn('roles.name' , ['Member'])


                        ->when($this->getFilter('unit'), fn ($query, $unit) => $query->where('group', $unit));
    }

    public function deleteSelected(){
        if(count($this->selectedKeys()) > 0){
            $ids = $this->selectedKeys();
            if(User::whereIn('id',$ids)->delete()){

                $this->dispatchBrowserEvent('success-izi',[
                    'ntitle' => 'Yeay!',
                    'nmessage'  => 'Data berhasil dipindahkan ke kotak sampah'
                ]);
            }

            $this->emit('refresh');
            return true;
        }

        $this->dispatchBrowserEvent('error-izi',[
            'ntitle' => 'Oops!',
            'nmessage'  => 'Anda belum memilih data'
        ]);
        
    }
    public function restoreSelected(){
        if(count($this->selectedKeys()) > 0){
            $ids = $this->selectedKeys();
            if(User::withTrashed()->whereIn('id',$ids)->restore()){
                $this->dispatchBrowserEvent('success-izi',[
                    'ntitle' => 'Yeay!',
                    'nmessage'  => 'Data berhasil dipulihkan'
                ]);
            }

            $this->emit('refresh');

            return true;
        }

        $this->dispatchBrowserEvent('error-izi',[
            'ntitle' => 'Oops!',
            'nmessage'  => 'Anda belum memilih data'
        ]);
        
    }

    public function filters(): array
    {
        $roles =Role::all()->pluck('name','name')->toArray();
        $roles[''] = 'Any';
        ksort($roles);

    
    
        
        return [
            'jabatan' => Filter::make('Jabatan')
                ->select($roles),
        ];
    }
}
