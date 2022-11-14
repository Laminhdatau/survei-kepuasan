<?php 

class M_auth extends CI_Model{
    function getAuth($user,$password,$level)
    {
        $query=$this->db->query("SELECT * FROM t_user where 'user'='$user' AND 'password'=MD5('$password')");
        return $query;
    }
}