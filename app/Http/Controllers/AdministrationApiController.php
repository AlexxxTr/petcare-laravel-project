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
        return $this->service->getPetAdministrations($id);
    }

    public function getHouseAdministrations($id)
    {
        return $this->service->getHouseAdministrations($id);
    }

    public function setAdministrationDone($id)
    {
        return $this->service->setAdministrationDone($id);
    }
}
