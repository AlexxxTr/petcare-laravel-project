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
        $this->service->getPet($petId);
        if ($this->service->getResult() == null) return response(['message' => 'No pet found'], 404);
        return $this->service->getResult();
    }

    public function getHouseOfPet($petId)
    {
        $this->service->getHouseOfPet($petId); 
        if ($this->service->getResult() == null) return response(['message' => 'No pet found'], 404);
        return $this->service->getResult();
    }

    public function createOrUpdate(Request $request, $petId = null)
    {
        $data = $request->all();
        $data['id'] = $petId;
        $this->service->createOrUpdate($data);
        if ($this->service->hasErrors()) return response($this->service->getErrors(), 403);
        if ($this->service->getResult() == null) return response(['message' => 'No pet found to update'], 404);
        return $this->service->getResult();
    }

    public function deletePet($petId)
    {
        $this->service->deletePet($petId);
        if ($this->service->getResult()) return response(['message' => 'Pet succesfully removed'], 200);
        else return response(['message' => 'No pet found to remove'], 404);
    }
}
