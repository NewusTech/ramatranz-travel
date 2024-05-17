<?php

namespace App\Http\Livewire\Backend\SearchConsole;

use App\Models\SearchConsole;
use Illuminate\Support\Facades\Log;
use Livewire\Component;


class FormSearchConsole extends Component
{
    public SearchConsole $search_console;

    protected $rules = [
        'search_console.name'        => '',
        'search_console.content'        => ''
    ];

    public function mount($id = null)
    {

        $this->search_console = new SearchConsole();

        if ($id) {
            $this->search_console = SearchConsole::findOrFail($id);
        }
    }
    public function render()
    {
        return view('livewire.backend.search-console.form-search-console');
    }

    public function save()
    {
        $this->validate();
        try {
            $this->search_console->save();
            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Search Console berhasil ditambahkan"]);

            redirect(route('data-search-console'));
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            $this->dispatchBrowserEvent('error-izi', ['ntitle' => 'Error', 'nmessage' => "Search Console tidak berhasil ditambahkan"]);
        }
    }
}
