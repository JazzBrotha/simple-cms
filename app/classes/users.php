<?php

class Users {
        public static function get_full_user($userId, $pdo) {
        $user = $pdo->prepare("SELECT *
            FROM users
            WHERE user_id = :id
            LIMIT 1
            ");
        $user->execute([':id' => $userId]);
        $result = $user->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
