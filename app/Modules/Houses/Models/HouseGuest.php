<?php

namespace App\Modules\Houses\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class HouseGuest extends Pivot
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'house_guests';
    
    protected $fillable = ['house_id', 'user_id'];
}
