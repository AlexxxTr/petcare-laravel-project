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

    public function house()
    {
        return $this->belongsTo(House::class, 'house_id', 'id');
    }

    public function picture()
    {
        return $this->hasMany(Picture::class, 'pet_id', 'id');
    }

    public function administration()
    {
        return $this->hasMany(Administration::class, 'pet_id', 'id');
    }
}
