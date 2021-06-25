<?php

    class Registration_Model extends Base_Model {
        protected $table = 'users';

        function hashPassword($password)
        {
            $new_password = md5($password);
            return $new_password;
        }

        function hashPassword_1($password)
        {
            $password = str_replace('1', "@0#34gregwef!", $password);
            $password = str_replace('2', "@0#34gr8498ef!", $password);
            $password = str_replace('3', "@0#34graDXAsdegwef!", $password);
            $password = str_replace('4', "@0#34gresdvgwef!", $password);
            $password = str_replace('5', "@0#34grdvvegwef!", $password);
            $password = str_replace('6', "@0#34grmhjmegwef!", $password);
            $password = str_replace('7', "@0#34grhngbegwef!", $password);
            $password = str_replace('8', "@0#34grgbfegwef!", $password);
            $password = str_replace('9', "@0#34g28752regwef!", $password);
            return $password;
        }

        function insert($data = []){
            $query = "insert into {$this->table}(name, email, phone, password) values (:name, :email, :phone, :password)";
            $sth = $this->db->prepare($query);
	        $sth->execute([
	        	':name' => $data['name'],
	        	':phone' => $data['phone'],
	        	':email' => $data['email'],
	        	':password' => $data['password'],

	        ]);
	        $data = $sth->fetch(PDO::FETCH_ASSOC);
	        $sth->closeCursor();
        }
    }