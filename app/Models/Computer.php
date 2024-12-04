<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;
    

    protected $fillable = ['brand', 'model', 'serial_number', 'status', 'customer_id'];

    // Relación con el historial de reparaciones
    public function repairHistories()
    {

        return $this->hasMany(RepairHistory::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
