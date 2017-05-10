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

    public static function has_access($userId, $postId, $pdo) {
        $hasAccess = $pdo->prepare(
            "SELECT COUNT(*) FROM posts
            WHERE post_id = :postId AND user_id = :userId;");
        $hasAccess->execute([
            ':postId' => $postId, ':userId' => $userId
        ]);
        $result = $hasAccess->fetch(PDO::FETCH_ASSOC);
        return ($result['COUNT(*)'] > 0);
    }
}
