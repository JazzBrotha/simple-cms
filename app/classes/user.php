<?php
//Class User constructs a user and stores it

class User 
{
    public $username;
    public $password;
    public $firstname;
    public $lastname;
    public $email;
    public $profession;
    public $description;
    public $created;
    public $is_admin;
    public $pdo;

    public function __CONSTRUCT($username, $password, $firstname, $lastname, $email, $profession, $description, $pdo) {
        $this->username = $username;
        $this->password = $password;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->profession = $profession;
        $this->description = $description;
        $this->created = date('Y-m-d H:i:s');
        $this->is_admin = false;
        $this->pdo = $pdo;
    }

    public function store_user(){
            return $this->pdo->prepare("INSERT INTO users
                (
                username,
                password,
                firstname,
                lastname,
                email,
                profession,
                description,
                created,
                is_admin
                )
        VALUES ('$this->username',
                '$this->password',
                '$this->firstname',
                '$this->lastname',
                '$this->email',
                '$this->profession',
                '$this->description',
                '$this->created',
                '$this->is_admin')
                ");
    }
}
