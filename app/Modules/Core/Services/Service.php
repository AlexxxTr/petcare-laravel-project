<?php

namespace App\Modules\Core\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

abstract class Service
{

    private $errors;
    protected $result;

    protected $rules = [];

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->errors = [];
        $this->result = [];
    }

    public function createOrUpdate($data) {
        $this->validate($data);
        $this->result = $this->model->updateOrCreate(['id' => $data['id']], $data);
    }

    protected function validate($data, $id = false)
    {
        $this->validateId($id);
        if ($this->hasErrors()) return;

        $this->validateData($data);
    }

    private function validateId($id)
    {
        if (!$id) return;

        $result = $this->model->find($id);
        if (!$result) {
            $this->result = [];
            $this->errors = ["record" => "not found"];
        }
    }

    private function validateData($data)
    {
        $validator = Validator::make($data, $this->rules);
        if ($validator->fails()) {
            $this->result = [];
            $this->errors = $validator->errors();
        }
    }

    public function hasErrors()
    {
        return count($this->errors) > 0;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getResult()
    {
        return $this->result;
    }
}
