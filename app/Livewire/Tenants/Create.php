<?php
namespace App\Livewire\Tenants;

use Livewire\Component;
use App\Models\Room;
use App\Models\Tenant;

class Create extends Component
{
    public $name;
    public $email;
    public $contact;
    public $room_id;
    public $apartment_id; // Will store the apartment name or id

    public $rooms = [];

    // Validation rules
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:tenants,email',
        'contact' => 'required|string|max:15',
        'room_id' => 'required|exists:rooms,id',
    ];

    // When the component is mounted, fetch available rooms
    public function mount()
    {
        // Fetch available rooms (availability = true)
        $this->rooms = Room::where('availability', true)->get();
    }

    // Update apartment_id when a room is selected
    public function updatedRoomId($roomId)
    {
        // Find the selected room
        $room = Room::find($roomId);

        // Automatically set the apartment_id based on the selected room
        if ($room) {
            $this->apartment_id = $room->apartment->name ?? 'N/A'; // Adjust this to show the apartment name or other identifier
        }
    }

    public function submit()
    {
        // Validate the form
        $validatedData = $this->validate();

        // Create the tenant
        Tenant::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'contact' => $validatedData['contact'],
            'apartment_id' => $this->apartment_id,  // Automatically set apartment
            'room_id' => $validatedData['room_id'],
        ]);

        // Mark room as unavailable (occupied)
        $room = Room::find($validatedData['room_id']);
        $room->availability = false;
        $room->save();

        // Reset form fields
        $this->reset();

        return redirect()->route('tenants.index');
    }

    public function render()
    {
        return view('livewire.tenants.create', [
            'rooms' => $this->rooms,  // Pass available rooms to the view
        ]);
    }
}






