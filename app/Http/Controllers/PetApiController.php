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

    public function getPet($petId) {
        return $this->service->getPet($petId);
    }

    public function deletePet($petId) {
        return $this->service->deletePet($petId);
    }
}
