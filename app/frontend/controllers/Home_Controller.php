<?php
    class Home_Controller extends Base_Controller{
        function __construct()
        {
            parent::__construct();
            $this->model->load('home', 'home');
        }

        function index()
        {
            $data = [
                'products'=>$this->model->home->find_all(),
                'slideProducts'=> $this->model->home->find_all(),
            ];
            $this->view->load('home/index',$data);
        }

        function processSearch()
        {
            $search = $_POST['search'];
            $data = [
                'products'=>$this->model->home->searchProduct_1($search),
                'slideProducts'=> $this->model->home->find_all(),
            ];
            $this->view->load('home/index',$data);
        }

        function processSort()
        {
            $sort= $_POST['sort'];
            $data = [
                'products'=>$this->model->home->bubbleSort($sort),
                'slideProducts'=> $this->model->home->find_all(),
            ];
            $this->view->load('home/index',$data);
        }

        function processTotal()
        {
            $total = $_POST['total'];
            $data = [
                'products'=>$this->model->home->totalPrice($total),
                'slideProducts'=> $this->model->home->find_all(),
            ];
            $this->view->load('home/index',$data);
        }

        function processSuggestion()
        {
            $suggestion = $_POST['search_1'];
            $data = [
                'products'=>$this->model->home->suggestionsPrice($suggestion),
                'slideProducts'=> $this->model->home->find_all(),
            ];
            $this->view->load('home/index',$data);
        }
    }