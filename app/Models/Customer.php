<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    /**
     * Relación: Un cliente puede tener varias computadoras.
     */
    public function computers()
    {
        return $this->hasMany(Computer::class);
    }
}
