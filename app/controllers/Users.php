<?php
  class Users extends Controller {
    public function __construct(){

    }
    
    public function register(){
        
        if($_SERVER['REQUEST_METHOD'] != 'POST'){
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
        }else{

        }
        // $data = [
        //     'title' => 'Simple',
        //     'description' => 'Post using a simple framework!'
        // ];

      
     
        
    }

    public function login(){
        $data = [
            
        ];

        $this->view('users/login', $data);
    }
  }
