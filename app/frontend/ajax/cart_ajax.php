<?php
    class CartAjax {
        protected $table = 'products';
        
        function getAllProducts() {
            $query = "select * from {$this->table}";
            $sth = $this->db->prepare($query); 
            $sth->execute();
            $data = $sth->fetchAll(PDO::FETCH_ASSOC);
            $sth->closeCursor();
            return $data;
        }
    }