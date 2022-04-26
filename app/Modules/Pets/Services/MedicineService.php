<?php

namespace App\Modules\Pets\Services;

use App\Modules\Core\Services\Service;
use App\Modules\Pets\Models\Medicine;

class MedicineService extends Service
{
    protected $rules = [
        "name" => ["required", "string"],
        "description" => ["required", "string"],
        "house_id" => ["required", "integer"]
    ];

    public function __construct(Medicine $model)
    {
        parent::__construct($model);
    }

    public function getMedicineById($id)
    {
        return $this->model->findOrFail($id);
    }
}
