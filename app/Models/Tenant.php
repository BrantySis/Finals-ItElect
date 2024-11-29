<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    /** @use HasFactory<\Database\Factories\TenantFactory> */
    use HasFactory;

    protected $fillable = [
        'name', 'room_id', 'contact', 'email'
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
    
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function dueBalances()
    {
        return $this->hasMany(DueBal::class);
    }
    
   
    
   
}