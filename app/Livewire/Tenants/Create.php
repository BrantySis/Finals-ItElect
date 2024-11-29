<?php

namespace App\Livewire\Tenants;

use Livewire\Component;
use App\Models\Apartment;
use App\Models\Room;
use App\Models\Tenant;

class Create extends Component
{
    public $name;
    public $email;
    public $apartment_id;
    public $room_id;
    public $contact;

    // Define validation rules
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:tenants,email',
        'contact' => 'required|string|max:15',
        'apartment_id' => 'required|exists:apartments,id',
        'room_id' => 'required|exists:rooms,id',
    ];
    public function mount()
    {
        // If needed, you can fetch apartments and rooms here
        $this->apartments = Apartment::all();
        $this->rooms = Room::all();
    }
    public function submit()
    {
        $validatedData = $this->validate();

        // Create the tenant
        Tenant::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'contact' => $validatedData['contact'],
            'apartment_id' => $validatedData['apartment_id'],
            'room_id' => $validatedData['room_id'],
        ]);

        // Reset form fields
        $this->reset();

        session()->flash('message', 'Tenant added successfully');

        return redirect()->route('tenants.index');
    }
    public function render()
    {
        return view('livewire.tenants.create', [
            'apartments' => Apartment::all(),
            'rooms' => Room::all(),
        ]);
    }
}
