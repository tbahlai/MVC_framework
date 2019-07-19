<?php
    
    namespace application\lib;
    use PDO;
    
    class Db
    {
        protected $db;
        
        public function __construct()
        {
            $config = require 'application/config/db.php';
            $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'].'', $config['user'], $config['password']);
           // $this->db->query("CREATE DATABASE camagru");
            //debug($this->db);
        }
        
        public function query($sql, $params = [])
        {
            $stmt = $this->db->prepare($sql);
            if (!empty($params))
            {
                foreach ($params as $key => $val)
                {
                    $stmt->bindValue(':'.$key, $val);
                }
            }
            $stmt->execute();
            return $stmt;
            //$query = $this->db->query($sql);
//            $res = $query->fetchColumn();
//            debug($res);
           // return $query;
        }
        
        public function row($sql, $params = [])
        {
            $res = $this->query($sql, $params);
            return $res->fetchAll(PDO::FETCH_ASSOC);
        }
        public function column($sql, $params = [])
        {
            $res = $this->query($sql, $params);
            return $res->fetchColumn();
        }
        
        
    }