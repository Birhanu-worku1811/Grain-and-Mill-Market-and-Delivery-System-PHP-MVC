<?php

class VerifyCode extends Controller
{
    public function index(){
        $data['page_title'] = "Verify Code";
        $this->view("verify-code", $data);
    }
}