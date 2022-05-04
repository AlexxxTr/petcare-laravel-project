<?php

namespace App\Http\Controllers;

use App\Modules\Pets\Services\AdministrationService;
use Illuminate\Http\Request;

class AdministrationApiController extends Controller
{
    private $service;

    public function __construct(AdministrationService $service)
    {
        $this->service = $service;
    }

    public function getPetAdministrations($id)
    {
        $this->service->getPetAdministrations($id);
        return $this->service->getResult();
    }

    public function getHouseAdministrations($id)
    {
        $this->service->getHouseAdministrations($id);
        return $this->service->getResult();
    }

    public function setAdministrationDone($id)
    {
        $this->service->setAdministrationDone($id);
        if ($this->service->getResult() == null) return response(['message' => 'No amdnistration found'], 404);
        return $this->service->getResult();
    }
}
