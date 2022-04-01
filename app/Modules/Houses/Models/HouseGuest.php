<?php

namespace App\Modules\Houses\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class HouseGuest extends Pivot
{
    use HasFactory;
    
    protected $fillable = ['house_id', 'user_id'];
}
