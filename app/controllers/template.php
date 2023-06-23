<?php

class Template extends Controller
{
    public function index(){
        $data['page_title'] = "Template";
        $this->view("template", $data);
    }
}