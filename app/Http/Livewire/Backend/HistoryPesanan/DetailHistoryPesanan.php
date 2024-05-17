<?php

namespace App\Http\Livewire\Backend\HistoryPesanan;

use App\Models\ListOrder;
use Livewire\Component;

class DetailHistoryPesanan extends Component
{
    public $detailUnggulan;
    public function mount($id)
    {
        $this->detailHistoryPesanan = ListOrder::where('id', $id)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.backend.history-pesanan.detail-history-pesanan');
    }
}
