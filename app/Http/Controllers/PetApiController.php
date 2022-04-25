<?php

namespace App\Http\Controllers;

use App\Modules\Pets\Services\PetService;
use Illuminate\Http\Request;

class PetApiController extends Controller
{
    private $service;

    public function __construct(PetService $service)
    {
        $this->service = $service;
    }

    public function getPet($petId)
    {
        return $this->service->getPet($petId);
    }

    public function getHouseOfPet($petId)
    {
        return $this->service->getHouseOfPet($petId);
    }

    public function createPet(Request $request)
    {
        $data = $request->all();
        $data['id'] = null;
        return $this->service->createOrUpdatePet($data);
    }

    public function updatePet(Request $request, $petId)
    {
        $data = $request->all();
        $data['id'] = $petId;
        return $this->service->createOrUpdatePet($data);
    }

    public function deletePet($petId)
    {
        return $this->service->deletePet($petId);
    }
}
