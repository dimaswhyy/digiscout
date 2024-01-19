<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengurusGudep extends Model
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
        'gudep_id',
        'admin_gudep_id',
        'photo_profile',
        'photo_full',
        'nta',
        'name',
        'gender',
        'address',
        'phone_number',
        'position_id',
        'information'
    ];
}
