<?php

namespace App\Modules\Pets\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory; 

    public $timestamps = false;
    
    protected $fillable = ['pet_id', 'image_path'];

    public function pet() {
        return $this->belongsTo(Pet::class, 'pet_id', 'id');
    }
}
