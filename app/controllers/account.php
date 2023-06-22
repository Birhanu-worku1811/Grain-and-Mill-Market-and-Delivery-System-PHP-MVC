<?php

class Account extends Controller
{
    public function index(){
        $data['page_title'] = "My Account";
        $this->view("account", $data);
    }
}