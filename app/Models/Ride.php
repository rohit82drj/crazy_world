<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Ride extends Model
{
    protected $table = 'ride';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

}