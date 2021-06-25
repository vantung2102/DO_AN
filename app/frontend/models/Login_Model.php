<?php

    class Login_Model extends Base_Model {

        protected $table = 'users';

        function checkUserExist($data = []){
            $query = "select id from {$this->table} where (email = :email and password = :password)";
            $sth = $this->db->prepare($query);
           
	        $sth->execute([
	        	':email' => $data['email'],
	        	':password' => $data['password'],
	        ]);
            
            $data = $sth->fetch(PDO::FETCH_ASSOC);
            $sth->closeCursor();
            return $data;
        }
    }