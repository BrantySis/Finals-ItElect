<?php

namespace App\Livewire\Tenants;

use App\Livewire\Forms\TenantForm;
use App\Models\Room;
use App\Models\Apartment;
use App\Models\Tenant;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Edit extends Component
{
    public TenantForm $form;
    public Tenant $tenant;  // Use Tenant model type for binding
    public $rooms = [];

    public function mount(Tenant $tenant)
    {
        $this->tenant = $tenant;

        // Pass the current component and property name to the form
        $this->form = TenantForm::fromModel($this->tenant, $this, 'form');
       
        $this->rooms = Room::with('apartment')->where('availability', true)->get();
    }

    public function render()
    {
        return view('livewire.tenants.edit', [
            'apartments' => Apartment::all(),
        ]);
    }

    public function updated($property)
    {
        if ($property === 'form.apartment_id') {
            $this->rooms = Room::where('apartment_id', $this->form->apartment_id)
                ->where('availability', true)
                ->get();
        }
    }

    public function updateTenant()
    {
        $this->validate();
    
        DB::transaction(function () {
            // Handle room availability logic BEFORE updating the tenant
            if ($this->form->room_id && $this->form->room_id != $this->tenant->room_id) {
                $previousRoom = Room::find($this->tenant->room_id);
                if ($previousRoom) {
                    $previousRoom->availability = true;
                    $previousRoom->save();
                }
    
                $newRoom = Room::find($this->form->room_id);
                if ($newRoom) {
                    $newRoom->availability = false;
                    $newRoom->save();
                }
            }
    
            // Update tenant details
            $this->tenant->update($this->form->all());
        });
    
        session()->flash('message', 'Tenant Edited successfully.');
    
        return $this->redirect(route('tenants.index'));
    }
}



