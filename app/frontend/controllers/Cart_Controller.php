<?php
     class Cart_Controller extends Base_Controller{
        function __construct()
        {
            parent::__construct();
            $this->model->load('cart','cart');
        }

        function cart(){
            $data =['cartProduct'=>$this->model->cart->find_All()];
            $this->view->load('cart/cart',$data);
        }

        function getProducts() {
            $this->layout->setLayout(null);
            $data = $this->model->cart->find_All();
            
            echo json_encode($data);

        }
    }