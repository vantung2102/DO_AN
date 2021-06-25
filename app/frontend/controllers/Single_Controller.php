<?php
    class Single_Controller extends Base_Controller{
        function __construct()
        {
            parent::__construct();
            $this->model->load('single', 'single');
        }

        function single()
        {
            $data = [
                'slideProduct'=>$this->model->single->findsql(),
            ];
            $this->view->load('single/single',$data);
        }
    }