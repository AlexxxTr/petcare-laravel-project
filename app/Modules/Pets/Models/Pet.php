<?php

namespace App\Modules\Pets\Models;

use App\Modules\Houses\Models\House;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory; 

    public $timestamps = false;
    
    protected $fillable = ['type', 'name', 'house_id'];

    public function house() {
        return $this->belongsTo(House::class, 'id', 'house_id');
    }
}
