<?php

class ChangePassword extends Controller
{
    public function index(){
        $data['page_title'] = "Change Password";
        $this->view("change-password", $data);
    }
}