<?php

class Controller{
    public function view($path, $data = []){
        if (file_exists("../app/views/".THEME.$path.".php")){
            include "../app/views/".THEME. $path.".php";
        }else{
            include "../app/views/".THEME."404.php";
        }
    }

    public function load_model($model){
        if (file_exists("../app/models/".strtolower($model).".php")){
            include "../app/models/".strtolower($model).".php";
            return $modal = new $model();
        }else{
            return false;
        }
    }
}