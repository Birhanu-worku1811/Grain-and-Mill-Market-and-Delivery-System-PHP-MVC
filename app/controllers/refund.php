<?php

class Refund extends Controller
{
    public function index(){
        $data['page_title'] = "Refund";
        $this->view("refund", $data);
    }
}