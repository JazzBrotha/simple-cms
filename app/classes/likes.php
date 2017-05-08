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
}