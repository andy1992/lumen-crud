<?php

namespace App;

class Application extends \Laravel\Lumen\Application
{
    public function publicPath()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'public';
    }
}