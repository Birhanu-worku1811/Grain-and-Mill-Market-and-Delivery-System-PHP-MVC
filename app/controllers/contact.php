<?php

class Contact extends Controller
{
    public function index(){
        $data['page_title'] = "Contact Us";
        $this->view("contact", $data);
    }
}