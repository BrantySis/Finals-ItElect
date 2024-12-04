<?php

namespace App\Livewire\Tenants;

use App\Livewire\Forms\TenantForm;
use App\Models\Room;
use App\Livewire\Tenants\Form;
use App\Models\Tenant;
use Livewire\Component;

class Edit extends Component
{
    public Tenant $tenant;
    public TenantForm $form;
    public $rooms = [];

    public function mount(Tenant $tenant)
    {
        $this->form = new TenantForm($this, 'tenant');// 'tenant' is just an example property name
        $this->tenant = $tenant;

        // Fetch available rooms
        $this->rooms = Room::where('availability', true)->get();
    }

    public function updated($property)
    {
        if ($property === 'form.room_id') {
            // Additional logic for when the room is changed (if necessary)
        }
    }

    public function update()
    {
        $this->validate();

        // Update the tenant data
        $this->tenant->update([
            'name' => $this->form->name,
            'email' => $this->form->email,
            'contact' => $this->form->contact,
            'room_id' => $this->form->room_id,
        ]);

        session()->flash('message', 'Tenant updated successfully!');
        return redirect()->route('tenants.index');
    }

    public function render()
    {
        return view('livewire.tenants.edit', [
            'rooms' => $this->rooms,
        ]);
    }
}

