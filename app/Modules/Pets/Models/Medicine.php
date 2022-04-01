<?php

namespace App\Modules\Pets\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $timestamps = false;
    
    protected $fillable = ['name', 'description'];
}
