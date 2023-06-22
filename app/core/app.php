<?php

class App
{
    protected $contrller = "home";
    protected $method = "index";
    protected $params;

    public function __construct()
    {
        $url = $this->parseURL();
        if (file_exists("../app/controllers/".strtolower($url[0]).".php")){
            $this->contrller = strtolower($url[0]);
            unset($url[0]);
        }

        require "../app/controllers/".$this->contrller.".php";
        $this->contrller = new $this->contrller;
        if (isset($url[1])){
            if (method_exists($this->contrller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        $this->params = (count($url)>0 ? $url: ['home']);
        call_user_func_array([$this->contrller, $this->method], $this->params);
    }

    private function parseURL()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : "home";
        return explode("/", filter_var(trim($url,'/'), FILTER_SANITIZE_URL));
    }
}