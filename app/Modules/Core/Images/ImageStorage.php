<?php

namespace App\Modules\Core\Images;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class ImageStorage
{
    private $path;

    private $file;
    private $type;
    private $error;

    function __construct()
    {
        $this->path = storage_path('/app/public/images');
        $this->type = "";
        $this->file = "";
    }
    public function load($image)
    {
        $path = $this->getPath($image);

        $this->type = "";
        $this->file = "";

        $this->error = !File::exists($path);
        if ($this->error) {
            return $this;
        }

        $this->file = File::get($path);
        $this->type = File::mimeType($path);

        return $this;
    }

    public function response()
    {
        if ($this->error) {
            return response("Image not found", 404);
        }

        $response = Response::make($this->file, 200);
        $response->header("Content-Type", $this->type);

        return $response;
    }

    private function getPath($image)
    {
        return $this->path . "/" . $image;
    }
}
