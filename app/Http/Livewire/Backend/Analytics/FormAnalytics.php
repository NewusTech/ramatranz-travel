<?php

namespace App\Http\Livewire\Backend\Analytics;

use App\Models\Analytics;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;

class FormAnalytics extends Component
{
    public $gambar;
    public Analytics $analytics;


    protected $rules = [
        'analytics.source'        => '',
        'analytics.code'         => '',
    ];
    public function mount($id = null)
    {

        $this->analytics = new Analytics();

        if ($id) {
            $this->analytics = Analytics::findOrFail($id);
        }
    }
    public function render()
    {
        return view('livewire.backend.analytics.form-analytics');
    }

    public function updatedBlogs($value, $key)
    {
        if ($key == 'title') {
            $this->analytics->id = Str::slug($value);
            $this->validateOnly('analytics.id');
        }
    }

    public function save()
    {
        $this->validate();
        try {
            $this->analytics->save();
            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Google Analytics berhasil ditambahkan"]);

            redirect(route('data-analytics'));
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            $this->dispatchBrowserEvent('error-izi', ['ntitle' => 'Error', 'nmessage' => "Google Analytics tidak berhasil ditambahkan"]);
        }
    }
}
