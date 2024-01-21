<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $connection = 'mysql';
    protected $table = "admins";

    protected $fillable = [
        'name', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'id',
    ];
}
