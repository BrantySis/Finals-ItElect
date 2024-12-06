<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\Tenant;

class Home extends Component
{

    public $roomsAvailable;
    public $totalTenants;
    public $showRooms = false; // Default value
    public $showTenants = false; // Default value
    public $availableRooms = [];
    public $tenants = [];

    public function mount()
    {
        $this->roomsAvailable = Room::where('availability', 1)->count();
        $this->totalTenants = Tenant::count();
    }

    public function fetchAvailableRooms()
    {
        $this->showRooms = !$this->showRooms; // Toggle visibility
        $this->availableRooms = $this->showRooms
            ? Room::with('apartment')->where('availability', 1)->get()
            : [];
    }

    public function fetchTenants()
    {
        $this->showTenants = !$this->showTenants; // Toggle visibility
        $this->tenants = $this->showTenants
            ? Tenant::with('room')->get()
            : [];
    }

    public function render()
    {
        return view('livewire.home');
    }
}
