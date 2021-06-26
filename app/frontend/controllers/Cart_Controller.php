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
            $status = API_SUCCESS;
            $message = '';
            $data = $this->model->cart->find_All();
            if (empty($data)) {
                $status = API_ERROR;
                $message = 'Cart is empty !';
            } else {
                $status = API_SUCCESS;
                $message = 'Cart has products !';
            }

		    return to_api_json($status, $message, $data);

        }
    }