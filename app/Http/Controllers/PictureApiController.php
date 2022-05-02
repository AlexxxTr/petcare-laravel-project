<?php

namespace App\Http\Controllers;

use App\Modules\Pets\Services\PictureService;
use Illuminate\Http\Request;

class PictureApiController extends Controller
{
    private $service;

    public function __construct(PictureService $service)
    {
        $this->service = $service;
    }

    public function getPicturesHouse($houseId)
    {
        $this->service->getPicturesHOuse($houseId);
        return $this->service->getResult();
    }

    public function getPicturesPet($petId)
    {
        $this->service->getPicturesPet($petId);
        return $this->service->getResult();
    }

    public function savePicture(Request $request) 
    {
        $this->service->savePicture($request);
        if ($this->service->hasErrors()) return response($this->service->getErrors(), 400);
        return $this->service->getResult();
    }
}
