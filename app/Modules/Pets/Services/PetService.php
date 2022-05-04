<?php

namespace App\Modules\Pets\Services;

use App\Modules\Core\Services\Service;
use App\Modules\Pets\Models\Pet;

class PetService extends Service
{
    protected $rules = [
        "name" => ["string", "required"],
        "type" => ["string", "required"],
        "house_id" => ["required", "integer"]
    ];

    public function __construct(Pet $model)
    {
        parent::__construct($model);
    }

    public function getPet($petId)
    {
        $this->result = $this->model->with('house')->find(['id' => $petId])->first();
        return $this->result;
    }

    public function getHouseOfPet($petId)
    {
        $pet = $this->getPet($petId);
        if ($pet == null) return $this->result = null;
        $this->result = $pet->house;
    }

    public function deletePet($petId)
    {
        $this->result = $this->model->where(['id' => $petId])->delete();
    }
}
