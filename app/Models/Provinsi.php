<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Provinsi extends Model
{
    use HasFactory, HasApiTokens;
    protected $connection = 'mysql';
    protected $table = "provinsi";
}
