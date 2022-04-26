<?php

namespace App\Modules\Pets\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = ['pet_id', 'date', 'meal', 'medicine_id', 'notes'];

    public function pet() {
        return $this->hasOne(Pet::class, 'id', 'pet_id');
    }

    public function medicine() {
        return $this->hasOne(Medicine::class, 'id', 'medicine_id');
    }
}
