<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrantedPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'permission',
        'grant_date',
        'granted_by'
    ];

    public $timestamps = false;
}
