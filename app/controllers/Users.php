<?php
  class Users extends Controller {
    public function __construct(){
        $this->userModel = $this->model('User');
    }
    
    public function register(){

       
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password1' => trim($_POST['password1']),
                'password2' => trim($_POST['password2']),
                'error_name' => '',
                'error_email' => '',
                'error_password1' => '',
                'error_password2' => ''
            ];

            if(empty($data['name'])){
                $data['error_name'] = 'Please enter your name';
            }
            if(empty($data['email'])){
                $data['error_email'] = 'Please enter your email';
            }else{
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['error_email'] = 'Email is already taken';
                }
            }

            if(empty($data['password1'])){
                $data['error_password1'] = 'Please enter a password';
            }else{
                if(strlen($data['password1']) < 8){
                    $data['error_password1'] = 'Password must be at least 8 characters';
                }elseif ( $data['password1'] != $data['password2']){
                    $data['error_password1'] = 'Please enter matching passwords';
                }
            }


            if(empty($data['password2'])){
                $data['error_password2'] = 'Please enter a password';
            }else{
                if(strlen($data['password2']) < 8){
                    $data['error_password2'] = 'Password must be at least 8 characters';
                }elseif ( $data['password1'] != $data['password2']){
                    $data['error_password2'] = 'Please enter matching passwords';
                }
            }

            if(!empty($data['error_name']) || !empty($data['error_email']) || !empty($data['error_password1']) || !empty($data['error_password2'])){
                $this->view('users/register', $data);
            }else{
                //Hash the password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register the user
                if($this->userModel->register($data)){
                    redirect('users/login');
                  } else {
                    die('Registration Failed: Please contact the site administrator.');
                  }
            }

        }else{
            $data = [
                'name' => '',
                'email' => '',
                'password1' => '',
                'password2' => '',
                'error_name' => '',
                'error_email' => '',
                'error_password1' => '',
                'error_password2' => ''
            ];

            $this->view('users/register', $data);

        }
     
    }

    public function login(){
        
        if($_SERVER['REQUEST_METHOD'] != 'POST'){
            $data = [
                'email' => '',
                'password1' => '',
                'error_email' => '',
                'error_password1' => '',
            ];

            $this->view('users/login', $data);
        }else{
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' => trim($_POST['email']),
                'password1' => trim($_POST['password1']),
                'error_email' => '',
                'error_password1' => '',
            ];

            if(empty($data['email'])){
                $data['error_email'] = 'Please enter your email';
            }
            if(empty($data['password1'])){
                $data['error_password1'] = 'Please enter a password';
            }else{

            }

            if(!empty($data['error_email']) || !empty($data['error_password1'])){
                $this->view('users/login', $data);
            }else{
                die('TEMP');            
            }
        }
        
    }
  }
