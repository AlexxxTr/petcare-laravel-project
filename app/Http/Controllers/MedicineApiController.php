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
        $this->service->getMedicineById($id);
        if (count($this->service->getResult()) != 1) return response('No medicine found', 404);
        return $this->service->getResult();
    }

    public function createOrUpdate(Request $request, $medicineId = null)
    {
        $data = $request->all();
        $data['id'] = $medicineId;

        $this->service->createOrUpdate($data);
        if ($this->service->hasErrors()) return response($this->service->getErrors(), 400);

        return $this->service->getResult();
    }
}
