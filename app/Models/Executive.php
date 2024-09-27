<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Executive extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'lastname',
        'photo',
        'phone',
        'address',
        'position',
        'state',
    ];
}
