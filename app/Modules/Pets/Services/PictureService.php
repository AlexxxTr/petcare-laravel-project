<?php

namespace App\Modules\Pets\Services;

use App\Modules\Core\Services\Service;
use App\Modules\Pets\Models\Picture;
use Illuminate\Support\Facades\Storage;

class PictureService extends Service
{

    protected $rules = [
        'pet_id' => 'required|integer',
        'image' => 'required|mimes:png,jpg|max:2048'
    ];

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

    public function savePicture($requestData)
    {
        $this->validate($requestData->all());
        if ($this->hasErrors()) return;

        $path = $requestData->file('image')->store('images');
        $picture = $this->model->create(['pet_id' => $requestData->pet_id, 'image_path' => $path]);

        $this->result = [     
            "success" => true,
            "message" => "File successfully uploaded",
            "picture" => $picture
        ];
    }
}
