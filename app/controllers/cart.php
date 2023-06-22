<?php

class Cart extends Controller
{
    public function index(){
        $data['page_title'] = "Cary";
        $this->view("cart", $data);
    }
}