<?php

    class Home_Model extends Base_Model {

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

         function compare($s1, $s2, $m, $n)
         {
             if($m == 0 || $n == 0) //O(1)
                 return 0; //O(1)
             else if ($s1[$m - 1] == $s2[$n - 1]) //O(1)
                 return 1 + $this->compare($s1, $s2, $m - 1, $n - 1); 
             else
                 return max($this->compare($s1, $s2, $m, $n - 1), $this->compare($s1, $s2, $m - 1, $n));
         }
       
         function searchProduct_1($search)//T2
         {
              
             $data = $this->findSql(); //O(1)

             $find = [];//O(1)
             $j = 0;//O(1)

             for($i=0; $i < count($data); $i++)// gọi count($data)=k => O(k)
             {   
                 $s1 = strtolower($search);//O(1)
                 $s2 = strtolower($data[$i]['name']);//O(1)
                 $m = strlen($search);//O(1)
                 $n = strlen($data[$i]['name']);//O(1)
 
                 $k =$this->compare($s1, $s2, $m, $n);//O(m*n)
                 if($k >=3)//O(1)
                 {
                     $find[$j] = $data[$i];//O(1)
                     $j++;//O(1)
                 }        
             }
             return $find;//O(1)
         }
 
        function compareName($name, $search)//T1
        {
            $name = strtolower($name);//O(1)
            $search = strtolower($search);//O(1)
            return strpos($name, $search);//O(1)
        }

        function searchProduct($search)//T2
        {   
            $data = $this->findSql();//O(1)
            $find = [];//O(1)
            $j = 0;//O(1)
            for($i=0; $i < count($data); $i++)// gọi count($data)=n => O(n)
            {   
                $result = $this->compareName($data[$i]['name'], $search);//O(1)
                if($result != "")//O(1)
                {
                    $find[$j] = $data[$i];//O(1)
                    $j++;//O(1)
                }
            }
            return $find;//O(1)
        }

        function bubbleSort($sort_method)//T3
        {
            $data = $this->findSql();//O(1)
            
            if($sort_method == 1)//O(1)
            {
                $data = $this->descPrice($data);// O(n^2)
            }
            else//O(1)
            {
                $data = $this->ascPrice($data);// O(n^2)
            }

            return $data;//O(1)
        }

        function descPrice($data)// T1
        {
            $length = count($data);//O(1)

            for($i = 0; $i < $length - 1; $i++)// gọi length = n => O(n-1)
            {
                for($j = $length - 1; $j > $i; $j--)//O(n-2)
                {
                    if($data[$j]['price'] < $data[$j -1]['price'])//O(1)
                    {
                        $temp = $data[$j];//O(1)
                        $data[$j] = $data[$j - 1];//O(1)
                        $data[$j - 1] = $temp;//O(1)
                    }
                }
            }
            return $data;//O(1)
        }
        function ascPrice($data)//T2
        {
            $length = count($data);//O(1)
            for($i = 0; $i < $length - 1; $i++)// gọi length = n => O(n-1)
            {
                for($j = $length - 1; $j > $i; $j--)//O(n-2)
                {
                    if($data[$j]['price'] >= $data[$j -1]['price'])//O(1)
                    {
                        $temp = $data[$j];//O(1)
                        $data[$j] = $data[$j - 1];//O(1)
                        $data[$j - 1] = $temp;//O(1)
                    }
                }
            }
            return $data;//O(1)
        }

        function totalPrice($total_method)
        {
            $data = $this->descPrice($this->findSql());
            
            if($total_method == 1)
            {
                $data = $this->total_1($data);
            }
            elseif($total_method == 2)
            {
                $data = $this->total_2($data);
            }
            else
            {
                $data = $this->total_3($data);
            }
            return $data;
        }
        
        function total_1($data)
        {
            $length = count($data);
            $j = 0;
            for($i = 0; $i < $length; $i++)
            {
                if($data[$i]['price'] <= 100)
                {
                    $find[$j] = $data[$i];
                    $j++;
                }
            }
            return $find;
        }
        function total_2($data)
        {
            $length = count($data);
            $j = 0;
            for($i = 0; $i < $length; $i++)
            {
                if($data[$i]['price'] > 100 && $data[$i]['price'] <= 400)
                {
                    $find[$j] = $data[$i];
                    $j++;
                }
            }
            return $find;
        }
        function total_3($data)
        {
            $length = count($data);
            $j = 0;
            for($i = 0; $i < $length; $i++)
            {
                if($data[$i]['price'] > 400)
                {
                    $find[$j] = $data[$i];
                    $j++;
                }
            }
            return $find;
        }

        function suggestionsPrice($price)
        {
            $data = $this->ascPrice($this->findSql());
            
            $length = count($data);
            $m = 0;
            for($i = $length -1; $i >= 0; $i--)
            {
                $m++;
                $n = 0;
                $tempPrice = $price;
                for($j = $i; $j >= 0; $j--)
                {
                    if($data[$j]['price'] < $price)
                    {
                        $find[$m][$n] = $data[$j];
                        $n++;
                        $tempPrice = $tempPrice - $data[$j]['price'];
                    }
                }
            }
            for($i = 1; $i <= $m; $i++)
            {
                
            }
            return $find;
        }
    }