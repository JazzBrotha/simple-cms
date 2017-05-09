<?php

class Users {
        public static function get_full_user($pdo) {
        $user_id = $_GET['user_id'];
        $user = $pdo->prepare("SELECT *
            FROM users
            WHERE user_id = :id
            LIMIT 1
            ");
        $user->execute([':id' => $user_id]);
        $user = $user->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}
