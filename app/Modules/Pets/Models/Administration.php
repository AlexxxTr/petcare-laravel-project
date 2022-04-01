<?php

namespace App\Modules\Pets\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    use HasFactory;

    protected $timestamps = false;
    
    protected $fillable = ['pet_id', 'date', 'meal', 'medicine_id', 'notes'];
}
