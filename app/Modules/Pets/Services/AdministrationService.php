<?php

namespace App\Modules\Pets\Services;

use App\Modules\Core\Services\Service;
use App\Modules\Pets\Models\Administration;

class AdministrationService extends Service
{
    protected $rules = [
        "pet_id" => ["required", "integer"],
        "date" => ["required", "date"],
        "meal" => ["required", "string"],
        "notes" => ["required", "string"],
        "medicine_id" => ["required", "integer"],
    ];

    public function __construct(Administration $model)
    {
        parent::__construct($model);
    }

    public function getPetAdministrations($petId)
    {
        $this->result = $this->model->with(['pet', 'medicine'])->where(['pet_id' => $petId, 'done' => false])->get();
    }

    public function getHouseAdministrations($houseId)
    {
        $this->result = $this->model->with(['pet', 'medicine'])->whereHas('pet', function ($query) use ($houseId) {
            $query->where('house_id', $houseId);
        })->get();
    }

    public function setAdministrationDone($id)
    {
        $adm = $this->model->find($id);
        if (!$adm) $this->result = null;
        $this->result = $adm->updateOrFail(['done' => true]);
    }
}
