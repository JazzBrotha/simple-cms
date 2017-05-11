<?php

class Likes {
    public $pdo;
    public function __CONSTRUCT($pdo){
        $this->pdo = $pdo;
    }
  public function count_likes($postId) {
         $likes = $this->pdo->prepare(
         "SELECT COUNT(*) FROM likes
         WHERE post_id = $postId;");
         $likes->execute();
         $result = $likes->fetch(PDO::FETCH_ASSOC);
         return $result['COUNT(*)'];
     }

    public function add_like($postId, $userId) {
        $like = $this->pdo->prepare(
            "INSERT INTO likes
            (post_id, user_id)
            VALUES (:postId, :userId)"
        );
        return $like->execute([
            ':postId' => $postId,
            ':userId' => $userId
        ]);
    }

    public function remove_like($postId, $userId) {
        $like = $this->pdo->prepare(
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
    public function check_like($postId, $userId) {
        $hasLiked = $this->pdo->prepare(
            "SELECT COUNT(*) FROM likes
            WHERE post_id = $postId AND user_id = $userId;");
        $hasLiked->execute();
        $result = $hasLiked->fetch(PDO::FETCH_ASSOC);
        return ($result['COUNT(*)'] > 0);
    }
}

$LIKES = new Likes($pdo);