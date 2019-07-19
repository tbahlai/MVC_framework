<?php
    
    namespace application\models;
    
    use application\core\Model;
    
    class Main extends Model
    {
        public function getNews()
        {
            $res = $this->db->row('SELECT title, description FROM news');
            return $res;
        }
    }