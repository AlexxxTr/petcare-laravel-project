<?php

namespace App\Modules\Houses\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $timestamps = false;
    
    protected $fillable = ['name', 'owner'];
}
