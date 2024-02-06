<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class custommer extends Model
{
    use HasFactory;
    protected $tamestamps = false;
    public $fillable = [
        'userName',
        'email',
        'password',
        'PhoneNumber',

    ];
}
