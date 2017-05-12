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
    public $picture;
    public $description;
    public $is_admin;
    public $pdo;

    public function __CONSTRUCT($username, $password, $firstname, $lastname, $email, $profession, $picture, $description, $pdo) {
        $this->username = $username;
        $this->password = $password;
        $this->firstname = noScript($firstname);
        $this->lastname = noScript($lastname);
        $this->email = $email;
        $this->profession = noScript($profession);
        $this->picture = noScript($picture);
        $this->description = noScript($description);
        $this->is_admin = false;
        $this->pdo = $pdo;
    }

    public function store_user(){
        $user = $this->pdo->prepare(
        "INSERT INTO users 
        (username, password, firstname, lastname, email, profession, picture, description, is_admin)
        VALUES 
        (:username, :password, :firstname, :lastname, :email, :profession, :picture, :description, :is_admin) 
        ");

        return $user->execute([
            ':username' => $this->username,
            ':password' => $this->password,
            ':firstname' => $this->firstname,
            ':lastname' => $this->lastname,
            ':email' => $this->email,
            ':profession' => $this->profession,
            ':picture' => $this->picture,
            ':description' => $this->description,
            ':is_admin' => $this->is_admin
        ]);
    }

        public function update_user($userId){
        $update = $this->pdo->prepare(
            "UPDATE users
            SET
            firstname = :firstname,
            lastname = :lastname,
            email = :email,
            profession = :profession,
            picture = :picture,
            description = :description
            WHERE user_id = :user_id
            AND username = :username
            ");
        
        return $update->execute([
            ':firstname' => $this->firstname,
            ':lastname' => $this->lastname,
            ':email' => $this->email,
            ':profession' => $this->profession,
            ':picture' => $this->picture,
            ':description' => $this->description,
            ':user_id' => $userId,
            ':username' => $this->username
        ]);
        
    }
}
