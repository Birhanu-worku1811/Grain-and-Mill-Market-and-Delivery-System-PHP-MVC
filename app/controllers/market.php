<?php

class Market extends Controller
{
    public function index(){
        $data['page_title'] = "Market";
        $this->view("market", $data);
    }
}