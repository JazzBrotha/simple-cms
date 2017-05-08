<?php

class Likes {
    public static function count_likes($postId, $pdo) {
        $likes = $pdo->prepare(
        "SELECT COUNT(*) FROM likes
        WHERE post_id = $postId;");
        $likes->execute();
        $result = $likes->fetch(PDO::FETCH_ASSOC);
        return $result['COUNT(*)'];
    }

    public static function add_like($postId, $userId, $pdo) {
        $like = $pdo->prepare(
            "INSERT INTO likes
            (post_id, user_id)
            VALUES (:postId, :userId)"
        );
        return $like->execute([
            ':postId' => $postId,
            ':userId' => $userId
        ]);
    }
}