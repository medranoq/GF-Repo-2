<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'gender',
        'age',
        'phone_number',
        'address',
        'country',
        'birthdate'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
