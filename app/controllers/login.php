<?php

class Login extends Controller {

    public function index($a='', $b=''){
        $data['page_title'] = "Login";
        $this->view("login", $data);
    }

}