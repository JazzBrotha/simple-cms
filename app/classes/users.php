<?php

class Users {
    public $pdo;
    public function __CONSTRUCT($pdo) {
        $this->pdo = $pdo;
    }
    public function get_full_user($userId) {
        $user = $this->pdo->prepare("SELECT *
            FROM users
            WHERE user_id = :id
            LIMIT 1
            ");
        $user->execute([':id' => $userId]);
        $result = $user->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function has_access($userId, $postId) {
        $hasAccess = $this->pdo->prepare(
            "SELECT COUNT(*) FROM posts
            WHERE post_id = :postId AND user_id = :userId;");
        $hasAccess->execute([
            ':postId' => $postId, ':userId' => $userId
        ]);
        $result = $hasAccess->fetch(PDO::FETCH_ASSOC);
        return ($result['COUNT(*)'] > 0);
    }
    public function delete_user($userId){
        $deleteUser = $this->pdo->prepare(
        "DELETE
        FROM users
        WHERE user_id = :id
        ");
        $deleteUser->execute([':id' => $userId]);
    }
}

$USERS = new Users($pdo);