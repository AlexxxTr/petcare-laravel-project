<?php

namespace App\Modules\Pets\Models;

use App\Modules\Houses\Models\House;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = ['name', 'description', 'house_id'];

    public function house() {
        return $this->hasOne(House::class, 'id', 'house_id');
    }
}
