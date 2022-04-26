<?php

namespace App\Modules\Houses\Models;

use App\Modules\Pets\Models\Pet;
use App\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = ['name', 'owner'];

    public function guests() {
        return $this->belongsToMany(User::class, 'house_guests', 'house_id', 'user_id')->using(HouseGuest::class);
    }

    public function pets() {
        return $this->hasMany(Pet::class);
    }

    public function owner() {
        return $this->hasOne(User::class, 'id', 'owner');
    }
}
