<?php

namespace App\Modules\Pets\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrationLanguage extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'administrations_language';
    
    protected $fillable = ['administration_id', 'date', 'meal', 'notes'];
}
