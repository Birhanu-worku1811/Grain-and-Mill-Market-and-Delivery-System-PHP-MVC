<?php

class User{
    private $ErrorMessage = "";
    private $emailPattern  = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    private $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d\s])[a-zA-Z\d\S]{8,}$/";
    public function register($post)
    {

        $db = Database::getInstance();
        $data['username'] = htmlspecialchars(stripslashes(trim($_POST['username'])));
        $data['First_Name'] = htmlspecialchars(stripslashes(trim($_POST['f_name'])));
        $data['Last_Name'] = htmlspecialchars(stripslashes(trim($_POST['l_name'])));
        $data['Age'] = htmlspecialchars(stripslashes(trim($_POST['age'])));
        $data['Email'] = htmlspecialchars(stripslashes(trim($_POST['email'])));
        $data['Password'] = trim($_POST['password']);
        $confirmPassword = htmlspecialchars(stripslashes(trim($_POST['confirm_password'])));


        if (empty($data['username'])) {
            $this->ErrorMessage = "<h3 style='color: red' align='center'>User name cannot be empty</h3>";
        } elseif (strlen($data['username']) > 15) {
            $this->ErrorMessage = "<h3 style='color: red'>User name cannot be longer than 15 characters</h3>";
        } elseif (empty($data['Age'])) {
            $this->ErrorMessage = "<h3 style='color: red'>Age is required</h3>";
        } elseif (empty($data['First_Name']) || empty($data['Last_Name'])) {
            $this->ErrorMessage = "<h3 style='color: red'>First Name and Last name are required";
        } elseif (!preg_match($this->emailPattern, $data['Email'])) {
            $this->ErrorMessage = "<h3 style='color: red'>Invalid email, Please check your email again</h3>";
        } elseif (empty($data['Password'])) {
            $this->ErrorMessage = "<h3 style='color: red'>Password cannot be empty</h3>";
        } elseif (!preg_match($this->passwordPattern, $data['Password'])) {
            $this->ErrorMessage = "<h4 style='color: red'>Password must: <ul> <li>contain an Upper and lower case letter</li><li>be atleast 8 chars long</li><li>contain atleast one charachter</li></ul></h4>";
        }elseif ($data['Password'] !== $confirmPassword) {
            $this->ErrorMessage = '<h3 style="color: red"><ul><li>Passwords do not match</li></ul></h3>';
        } else {

//        check if username is taken
            $sql = "SELECT * FROM user_profiles where username=:username limit 1";
            $arr['username'] = $data['username'];
            $checkUsername = $db->read($sql, $arr);
            if (is_array($checkUsername)) {
                $this->ErrorMessage = "<h4 style='color: red;'> Username taken";
            }

            //check if email exists
            $arr = false;
            $sql = "SELECT * FROM user_profiles where Email=:Email limit 1";
            $arr['Email'] = $data['Email'];
            $checkEmail = $db->read($sql,$arr);
            unset($arr['Email']);
            if (is_array($checkEmail)){
                $this->ErrorMessage ="<h4 style='color: red;'> There is an account with this email already";
            }

            //check for url_address existence
            $data['url_address'] = $this->get_random_link(60);
            $arr = false;
            $sql = "SELECT * FROM user_profiles where url_address=:url_address limit 1";
            $arr['url_address'] = $data['url_address'];
            $checkUrl = $db->read($sql,$arr);
            unset($arr['url_address']);
            if (is_array($checkUrl)){
                $data['url_address'] = $this->get_user();
            }
        }
        // if validation passed
        if (empty($this->ErrorMessage)){
            $data['Password'] = hash('sha1', $data['Password']);
            $query = "INSERT INTO user_profiles(username, First_Name, Last_Name, Age, Email, Password, url_address)
                  VALUES (:username, :First_Name, :Last_Name, :Age, :Email, :Password, :url_address)";
            $result = $db->write($query, $data);
            if ($result){
                header("Location:" .ROOT."login");
                die;
            }
        }

        $_SESSION['error'] = $this->ErrorMessage;
    }

    public function login($post){
        $db = Database::getInstance();
        $data['username'] = htmlspecialchars(stripslashes(trim($post['username'])));
        $data['Password'] = trim($post['password']);

        $data['Password'] = hash('sha1', $data['Password']);
        $sql = "SELECT * FROM user_profiles where username=:username && Password=:Password limit 1";
        $user = $db->read($sql, $data);
        if (is_array($user) && count($user)>0) {
            $_SESSION['user_url'] = $user[0]->url_address;
           header("Location: ".ROOT."home");
           die;
        }
        $this->ErrorMessage = "<h4 style='color: red'>Invalid username or Password</h4>";
        $_SESSION['error'] = $this->ErrorMessage;
    }

    public function get_user($post=[]){

    }

    public function get_random_link($length){
        $characters = array(
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
            'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
            'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
        );
        $link = "";
        $length = rand(4,$length);

        for($i = 0; $i<$length;$i++){
            $random = rand(0,61);
            $link .=$characters[$random];
        }
        return $link;
    }

    public function check_login(){
        if (isset($_SESSION['user_url'])){
            $db = Database::getInstance();
            $arr['url'] = $_SESSION['user_url'];
            $query = "SELECT * FROM user_profiles WHERE url_address=:url limit 1";
            $result = $db->read($query, $arr);
            if (is_array($result)){
                return $result[0];
            }
        }
        return false;
    }

    public function logout(){
        if (isset($_SESSION['user_url'])){
            unset($_SESSION['user_url']);
        }
        header("Location: ".ROOT."home");
        die;
    }
}
















