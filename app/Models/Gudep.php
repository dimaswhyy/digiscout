<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudep extends Model
{
    use HasFactory;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'school_logo',
        'gudep_logo',
        'school_name',
        'level',
        'gudep_registration_pa',
        'gudep_registration_pi',
        'address',
        'district',
        'city',
        'province',
        'phone_number',
        'information'
    ];
}
