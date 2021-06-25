<?php
    class ProductDetail_Controller extends Base_Controller{
        function __construct()
        {
            parent::__construct();
            $this->model->load('productDetail', 'product_detail');
        }

        function detail()
        {
            $id = $_GET['id'];
            $data = ['single'=>$this->model->product_detail->getProductDetail($id)];
            $this->view->load('single/single',$data);
        }

    }