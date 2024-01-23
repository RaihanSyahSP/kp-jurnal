<?php 

class User_model {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function login($username, $password)
    {
        $isCredentialsValid = $this->verifyCredentials($username, $password);

        if ($isCredentialsValid) {
            $_SESSION['username'] = $username;
            return true;
        } else {
            return false;
        }
    }

    private function verifyCredentials($username, $password)
    {
        $user = $this->getUserByUsername($username);

        if ($user) {
            if ($password === $user['password']) {
                return $user;
            }
        }

        return false;
    }

    private function getUserByUsername($username)
    {
        $this->db->query("SELECT * FROM user WHERE username = :username");
        $this->db->bind(':username', $username);

        return $this->db->single();
    }

}