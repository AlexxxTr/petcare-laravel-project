<?php

namespace App\Http\Controllers;

use App\Modules\Pets\Services\MedicineService;
use Illuminate\Http\Request;

class MedicineApiController extends Controller
{
    private $service;

    public function __construct(MedicineService $service)
    {
        $this->service = $service;
    }

    public function getMedicineById($id) {
        return $this->service->getMedicineById($id);
    }
}
