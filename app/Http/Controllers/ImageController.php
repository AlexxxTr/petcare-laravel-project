<?php

namespace App\Http\Controllers;

use App\Modules\Core\Images\ImageStorage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    private $service;

    public function __construct(ImageStorage $service)
    {
        $this->service = $service;
    }

    public function retrieveImage($image)
    {
        return $this->service->load($image)->response();
    }
}
