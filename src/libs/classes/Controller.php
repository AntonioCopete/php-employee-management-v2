<?php

 class Controller
 {
     public function __construct() {
         $this->view = new View();
     }

     public function loadModel($model) {
        $url = MODELS . $model . "Model.php";

        if(file_exists($url)) {
            require $url;

            $modelName = $model . "Model.php";
            $this->model = new $modelName();
        }
    }
 }