<?php

namespace App\Modules\Pets\Services;

use App\Modules\Core\Services\Service;
use App\Modules\Pets\Models\Pet;

class PetService extends Service {
    protected $rules = [
        "name" => ["string", "required"],
        "type" => ["string", "required"],
        "house_id" => ["required", "number"]
    ];

    public function __construct(Pet $model)
    {
        parent::__construct($model);
    }

    public function getPet($petId) {
        return $this->model->findOrFail(['id' => $petId])->first();
    }

    public function deletePet($petId) {
        return $this->model->where(['id' => $petId])->delete();
    }
}