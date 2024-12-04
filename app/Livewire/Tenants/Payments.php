<?php

namespace App\Livewire\Tenants;

use Livewire\Component;
use App\Models\Tenant;
use App\Models\Apartment;
use App\Models\Room;

class Payments extends Component
{
    protected $listeners = ['tenantAdded' => '$refresh'];
    
    public function render()
    {
        // Paginate the tenants along with their due balances
        $tenants = Tenant::with('apartment', 'room','dueBalances')->paginate(10); // Adjust the number of items per page

        // Pass the paginated tenants to the view

        return view('livewire.tenants.payments', [
            'tenants' => $tenants,
        ]);
    }
}

