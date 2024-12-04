<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Tenant;

class TenantForm extends Form
{
    public ?Tenant $tenant;

    public $name;
    public $email;
    public $contact;
    public $room_id;

    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:tenants,email',
            'contact' => 'required|string|max:15',
            'room_id' => 'required|exists:rooms,id',
        ];

        if (isset($this->tenant)) {
            $rules['email'] = 'required|email|unique:tenants,email,' . $this->tenant->id;
        }

        return $rules;
    }

    public function setTenant(Tenant $tenant)
    {
        $this->tenant = $tenant;

        $this->name = $tenant->name;
        $this->email = $tenant->email;
        $this->contact = $tenant->contact;
        $this->room_id = $tenant->room_id;
    }

    public function messages()
    {
        return [
            'room_id.required' => 'The room field is required.',
            'email.required' => 'The email field is required.',
            'contact.required' => 'The contact field is required.',
        ];
    }
}

