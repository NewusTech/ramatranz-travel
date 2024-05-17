<?php

namespace App\Http\Livewire\User\Table;

use App\Exports\UserExport;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Facades\Excel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Spatie\Permission\Models\Role;

class ActiveUserTable extends DataTableComponent
{
    protected $listeners = ['refresh'];
    public function refresh()
    {
        return $this->refresh;
    }
    protected $role;

    public bool $columnSelect = true;

    public array $bulkActions = [
        'deleteSelected' => 'Delete',
        // 'exportExcel'   => 'Export Excel'
    ];



    public function columns(): array
    {
        return [
            Column::make(__('Name'), 'name')->sortable()->searchable()->format(function ($value, $column, $row) {
                $url = route('user-profile', $row->id);
                return "<a href='$url'>$value</a>";
            })->asHtml(),
            Column::make('Email', 'email')->sortable()->searchable(),
            Column::make('Role', 'role')->sortable()->searchable(function (Builder $query, $term) {
                return $query->orWhere('roles.name', 'like', '%' . trim($term) . '%');
            }),

            Column::make('Dibuat', 'created_at'),
            Column::make(__('Action'), 'roles')->format(function ($value, $column, $row) {
                $button = "<div class='dropdown d-inline mr-2'>
                            <button class='btn btn-primary ' type='button'
                                id='dropdownMenuButton' data-toggle='dropdown'
                                aria-haspopup='true' aria-expanded='false'>
                                <i class='fa fa-ellipsis-v' aria-hidden='true'></i>
                            </button>
                            <div class='dropdown-menu' x-placement='top-start'
                                style='position: absolute; transform: translate3d(0px, -10px, 0px); top: 0px; left: 0px; will-change: transform;'>";
                if (auth()->user()->can('users.edit')) :
                    $button .= " <a class='dropdown-item ' href='" . route('edituser', $row->id) . "' role='button' data-action='open' data-mode='update' data-id='$row->id' 
                                    >Edit</a>";

                endif;
                if (auth()->user()->can('users.delete')) :
                    $button .= "<a class='dropdown-item btnAction' role='button' data-action='confirm' data-id='$row->id' data-force='false'
                                    >Delete</a>";
                endif;
                $button .= "</div></div>";

                // if($row->id === auth()->user()->id){
                //     return null;
                // }
                return $button;
            })->asHtml(),
        ];
    }

    public function query(): Builder
    {

        $q =  User::query()->selectRaw('users.id as id, 
                                          users.name,
                                          users.email as email, 
                                          users.created_at as created_at, 
                                          roles.name as role')
            ->leftJoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
            ->leftJoin('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->groupBy('users.id')
            ->whereNotIn('roles.name', ['Member']);
        // ->when($this->getFilter('jabatan'), fn ($query, $jabatan) => $query->where('role', $jabatan));;
        return $q;
    }


    public function deleteSelected()
    {
        if (count($this->selectedKeys()) > 0) {

            $ids = $this->selectedKeys();

            if (in_array(auth()->user()->id, $ids)) {
                $this->dispatchBrowserEvent('error-izi', [
                    'ntitle' => 'Oops!',
                    'nmessage'  => 'Anda tidak diperbolehkan menghapus akun Anda'
                ]);
                return false;
            }

            if (User::whereIn('id', $ids)->delete()) {

                $this->dispatchBrowserEvent('success-izi', [
                    'ntitle' => 'Yeay!',
                    'nmessage'  => 'Data berhasil dipindahkan ke kotak sampah'
                ]);
                $this->emit('refresh');
            }

            return true;
        }

        $this->dispatchBrowserEvent('error-izi', [
            'ntitle' => 'Oops!',
            'nmessage'  => 'Anda belum memilih data'
        ]);
    }

    public function exportExcel()
    {
        return Excel::download(new UserExport(), 'users.xlsx');
    }


    public function filters(): array
    {
        $roles = Role::all()->pluck('name', 'name')->toArray();
        $roles[''] = 'Any';
        ksort($roles);




        return [

            // 'jabatan' => Filter::make('Jabatan')
            //     ->select($roles),
        ];
    }
}
