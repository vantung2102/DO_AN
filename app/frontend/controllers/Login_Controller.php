<?php
    class Login_Controller extends Base_Controller{
        function __construct()
        {
            parent::__construct();
            $this->model->load('login', 'login');
            $this->model->load('Registration', 'registration');
        }
        
        function login()
        {
            $this->view->load('login/login');
        }
        
        function processLogin()
        { 
            if(empty($_POST['email']) || empty($_POST['password']))
            {
                redirect('login/login?success=0');
            }  
            else
            {
                $data = [
                    'email'=> $_POST['email'],
                    'password'=> $this->model->registration->hashPassword($_POST['password']),
                ];
                $check = $this->model->login->checkUserExist($data);
                if($check == false)
                {
                    redirect('login/login?success=2');
                }
                else
                {
                    $_SESSION['id'] = $check['id'];
                    redirect('home/index?success=1'); 
                }
            }
        }

        function logout(){
            session_destroy();
            redirect('login/login?success=3');
        }
    }