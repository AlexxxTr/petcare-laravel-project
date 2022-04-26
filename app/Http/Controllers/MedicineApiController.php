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

    public function getMedicineById($id)
    {
        return $this->service->getMedicineById($id);
    }

    public function createOrUpdate(Request $request, $medicineId = null)
    {
        $data = $request->all();
        $data['id'] = $medicineId;
        return $this->service->createOrUpdate($data);
    }
}
