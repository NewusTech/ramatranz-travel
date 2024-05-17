<?php

namespace App\Http\Livewire\User\Notifications;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UnreadNotif extends DataTableComponent
{

    
  
    
    public function columns(): array
    {
        return [
            Column::make('Title', 'name'),
        ];
    }

    public function query(): Builder
    {
        return User::query();
    }
}
