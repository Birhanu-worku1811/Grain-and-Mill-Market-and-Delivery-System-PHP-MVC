<?php

class Checkout extends Controller
{
    public function index(){
        $data['page_title'] = "Checkout";
        $this->view("checkout", $data);
    }
}