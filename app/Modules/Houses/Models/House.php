<?php

namespace App\Modules\Houses\Models;

use App\Modules\Pets\Models\Pet;
use App\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $timestamps = false;
    
    protected $fillable = ['name', 'owner'];

    public function guests() {
        return $this->belongsToMany(User::class)->using(HouseGuest::class);
    }

    public function pets() {
        return $this->hasMany(Pet::class);
    }
}
