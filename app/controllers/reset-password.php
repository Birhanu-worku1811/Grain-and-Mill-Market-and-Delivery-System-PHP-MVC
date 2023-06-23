<?php

class ResetPassword extends Controller
{
    public function index(){
        $data['page_title'] = "Reset Password";
        $this->view("reset-password", $data);
    }
}