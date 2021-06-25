<?php

    class Single_Model extends Base_Model {
        protected $table = 'products';

        function findSql()
        {
            $query = "select * from {$this->table}";
            $sth = $this->db->prepare($query); 
            $sth->execute();
            $data = $sth->fetchAll(PDO::FETCH_ASSOC);
            $sth->closeCursor();
            return $data;
        }
    }