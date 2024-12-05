<?php

namespace App\Livewire\Tenants;

use App\Livewire\Forms\TenantForm;
use App\Models\Room;
use App\Models\Apartment;
use App\Models\Tenant;
use Livewire\Component;

class Create extends Component
{
    public TenantForm $form; // Form object for tenant creation

    public $rooms = []; // Stores available rooms

    public function render()
    {
        return view('livewire.tenants.create', [
            'apartments' => Apartment::all(), 
           // Pass all apartments to the view
        ]);
    }

    public function updated($property)
    {
        if ($property === 'form.apartment_id') {
            // Update the list of rooms based on the selected apartment
            $this->rooms = Room::where('apartment_id', $this->form->apartment_id)
                ->where('availability', true)
                ->get();
        }
    }
    public function mount()
    {
        // Fetch rooms from the database
        $this->rooms = Room::with('apartment')->where('availability', true)->get();
    }

    public function addTenant()
    {
        $this->validate();

        // Create the tenant
        Tenant::create(
            $this->form->all()
        );

        // Update room availability
        if ($this->form->room_id) {
            $room = Room::find($this->form->room_id);
            if ($room) {
                $room->availability = false;
                $room->save();
            }
        }

        
        session()->flash('message', 'Tenant Created successfully.');

        
        // Redirect back to the tenants index page
        return $this->redirect(Index::class, navigate: true);
    }
}







