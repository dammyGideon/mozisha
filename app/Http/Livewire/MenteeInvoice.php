<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MenteeInvoice extends Component
{
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.mentee.mentee-invoice', [
            'invoices' => Invoice::where('mentee_id', Auth::user()->id)->latest()->paginate(12),
        ]);
    }
}
