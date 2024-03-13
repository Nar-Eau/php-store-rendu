<?php

require_once 'Table.php';

class Users extends Table
{

    private $login;

    private string $password;

    public function __construct() {
        parent::__construct('Users');
    }


    public function setLogin($login):self {
        $this->login = $login;
    }

    public function setPassword($password):self {
        $this->password = $password;
    }

    public function getLogin($login):self {
        return $this->login;
    }

    public function getPassword($password):self {
        return $this->password;
    }
}
