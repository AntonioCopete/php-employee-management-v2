<?php

class Controller
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function loadModel($model)
    {
        $modelName = $model . 'Model.php';
        $url = MODELS . $modelName;

        $this->model = new $modelName;

        if (file_exists($url)) {
            require $url;

            $modelName = $model . "Model";
            $this->model = new $modelName();
        }
    }
}
