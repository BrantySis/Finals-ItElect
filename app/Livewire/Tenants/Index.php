<?php

namespace App\Livewire\Tenants;

use Livewire\Component;
use App\Models\Tenant; 

class Index extends Component
{

    public function deleteTenant($tenantId)
    {
         // Find the tenant by ID and load the associated room relationship
         $tenant = Tenant::with('room')->findOrFail($tenantId);

         // Check if the tenant has an associated room
         if ($tenant->room) {
            // Ensure the room's availability is set to true
            $room = $tenant->room;  // Get the associated room
            $room->availability = true;  // Set availability to true
            $room->save();  // Save the changes to the room
         }

         $tenant->delete();

        // Optionally, flash a success message
        session()->flash('message', 'Tenant deleted successfully.');

        // Refresh the tenant list
        $this->render();
    }

    public function render()
    {
        $tenants = Tenant::paginate(10);
        // Pass the tenants data to the view
        return view('livewire.tenants.index', [
            'tenants' => $tenants
        ]);
    }
}
