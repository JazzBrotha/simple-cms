<?php

//Class User handles events of a single user, such as creating & updating it
class User 
{
    public $username;
    public $password;
    public $firstname;
    public $lastname;
    public $email;
    public $profession;
    public $description;
    // public $created;
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
        // $this->created = date('Y-m-d H:i:s');
        $this->is_admin = false;
        $this->pdo = $pdo;
    }

    public function store_user(){
        $user = $this->pdo->prepare(
        "INSERT INTO users 
        (username, password, firstname, lastname, email, profession, description, is_admin)
        VALUES 
        (:username, :password, :firstname, :lastname, :email, :profession, :description, :is_admin) 
        ");

        return $user->execute([
            ':username' => $this->username,
            ':password' => $this->password,
            ':firstname' => $this->firstname,
            ':lastname' => $this->lastname,
            ':email' => $this->email,
            ':profession' => $this->profession,
            ':description' => $this->description,
            ':is_admin' => $this->is_admin
        ]);
    }
}
