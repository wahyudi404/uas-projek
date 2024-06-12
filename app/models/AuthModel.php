<?php

class AuthModel extends Database 
{
    private $table = 'users';

    public function login($username, $password)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE username=:username";
        $this->query($query);
        $this->bind('username', $username);
        $this->execute();
        $result = $this->result();
        
        if(isset($result)) {
            if($username == $result['username'] && password_verify($password, $result['password'])) {
                return $result;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
}