<?php
    class Registration_Controller extends Base_Controller{

    function __construct()
    {
        parent::__construct();
        $this->model->load('registration', 'registration');
    }

        function registration(){
            $this->view->load('registration/registration');
        }

        function processRegister()
        {
            if(empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['re_password'])){
                redirect('registration/registration?registration=0');
            }
            else
            {
                $password =  $this->model->registration->hashPassword($_POST['password']);
                $re_password = $this->model->registration->hashPassword($_POST['re_password']);
                if($password == $re_password)
                {
                    $data = [
                        'name'=> $_POST['name'],
                        'email'=> $_POST['email'],
                        'phone'=> $_POST['phone'],
                        'password'=> $this->model->registration->hashPassword($_POST['password']),
                    ];
                    $this->model->registration->insert($data);
                    redirect('login/login?registration=2');
                }
                else
                {
                    redirect('registration/registration?registration=1');
                }
            }
        }
    }