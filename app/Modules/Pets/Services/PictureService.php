<?php

namespace App\Modules\Pets\Services;

use App\Modules\Core\Services\Service;
use App\Modules\Pets\Models\Picture;

class PictureService extends Service {
    public function __construct(Picture $model)
    {
        parent::__construct($model);   
    }

    public function getPicturesHouse($houseId)
    {
        $this->result = $this->model->with('pet')->whereHas('pet', function ($query) use ($houseId) {
            $query->where('house_id', $houseId);
        })->get();
    }

    public function getPicturesPet($petId)
    {
        $this->result = $this->model->with('pet')->where('petId', $petId)->get();
    }
}