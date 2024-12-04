<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairHistory extends Model
{
    use HasFactory;
    

    protected $fillable = ['computer_id', 'issue', 'solution', 'repair_date'];

    // Relación con la computadora
    public function computer()
    {
        return $this->belongsTo(Computer::class);
    }
}
