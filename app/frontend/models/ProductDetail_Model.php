<?php

    class ProductDetail_Model extends Base_Model {

        protected $table = 'product_details';

        function getProductDetail($id){
            $query = "select * from {$this->table} join products on {$this->table}.product_id = products.id where product_id = :product_id";
            $sth = $this->db->prepare($query);
            $sth->execute([
	        	':product_id' => $id,
	        ]);
	        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }