<?php

class Terms extends Controller
{
    public function index(){
        $data['page_title'] = "Terms";
        $this->view("terms", $data);
    }
}