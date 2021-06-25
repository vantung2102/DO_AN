<?php
    class Cart_Model extends Base_Model{
        protected $table = 'products';

        function cart(){
            $query = "select * from {$this->table}";
            $sth = $this->db->prepare($query); 
            $sth->execute();
            $data = $sth->fetchAll(PDO::FETCH_ASSOC);
            $sth->closeCursor();
            return $data;
        }

        function getAllProducts() {
            $query = "select * from {$this->table}";
            $sth = $this->db->prepare($query); 
            $sth->execute();
            $data = $sth->fetchAll(PDO::FETCH_ASSOC);
            $sth->closeCursor();
            $output[] = $data;
            return $output;
        }
    }