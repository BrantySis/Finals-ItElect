<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DueBal extends Model
{
    /** @use HasFactory<\Database\Factories\DueBalanceFactory> */
    use HasFactory;

    protected $table = 'due_balances';
    
    protected $fillable = ['tenant_id', 'amount_due', 'due_date', 'status'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
    
    
}