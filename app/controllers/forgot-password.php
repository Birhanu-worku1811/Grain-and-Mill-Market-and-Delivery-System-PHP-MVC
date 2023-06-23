<?php

class ForgotPassword extends Controller
{
    public function index(){
        $data['page_title'] = "Forgot Passwrod";
        $this->view("forgot-password", $data);
    }
}