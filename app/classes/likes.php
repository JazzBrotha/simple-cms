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

    public static function remove_like($postId, $userId, $pdo) {
        $like = $pdo->prepare(
            "DELETE FROM likes
            WHERE post_id = :postId
            AND user_id = :userId;"
        );
        return $like->execute([
            ':postId' => $postId,
            ':userId' => $userId
        ]);
    }

    //returns true if post is liked by user and false if not
    public static function check_like($postId, $userId, $pdo) {
        $hasLiked = $pdo->prepare(
            "SELECT COUNT(*) FROM likes
            WHERE post_id = $postId AND user_id = $userId;");
        $hasLiked->execute();
        $result = $hasLiked->fetch(PDO::FETCH_ASSOC);
        return ($result['COUNT(*)'] > 0);
    }
}
