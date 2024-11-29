<?php

namespace App\Livewire\Tenants;

use Livewire\Component;
use App\Models\Tenant; 

class Index extends Component
{
    public function render()
    {
        $tenants = Tenant::paginate(10);
        // Pass the tenants data to the view
        return view('livewire.tenants.index', [
            'tenants' => $tenants
        ]);
    }
}
