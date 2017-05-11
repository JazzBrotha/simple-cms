<?php

//Class Posts makes selections of posts from the DB

class Posts {
    public $pdo;
    public function __CONSTRUCT($pdo) {
        $this->pdo = $pdo;
    }
    public function get_all_posts(){
        $stmt = $this->pdo->prepare("SELECT
            posts.post_id,
            posts.title,
            posts.body,
            posts.tags,
            posts.created,
            posts.user_id,
            users.username,
            users.firstname,
            users.lastname
            FROM posts
            INNER JOIN users
            ON posts.user_id = users.user_id
            ORDER BY post_id DESC
            LIMIT 10
            ");
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }

    public function get_full_post() {
        $post_id = $_GET['post_id'];
        $page = $this->pdo->prepare("SELECT
            posts.post_id,
            posts.title,
            posts.body,
            posts.tags,
            posts.created,
            posts.updated,
            posts.user_id,
            users.firstname,
            users.lastname
            FROM posts
            INNER JOIN users
            ON posts.user_id = users.user_id
            WHERE post_id = :id
            LIMIT 1
            ");
        $page->execute([':id' => $post_id]);
        $page = $page->fetch(PDO::FETCH_ASSOC);
        return $page;
    }

    public function get_user_posts($userId){
        $pages = $this->pdo->query("SELECT post_id, user_id, title, created, updated, tags, body
        FROM posts
        WHERE user_id = $userId
        ORDER BY created DESC
        ")->fetchAll(PDO::FETCH_ASSOC);
        return $pages;

    }
    public function get_next_posts(){
        $stmt = $this->pdo->prepare("SELECT
            posts.post_id,
            posts.title,
            posts.body,
            posts.tags,
            posts.created,
            posts.user_id,
            users.firstname,
            users.lastname
            FROM posts
            INNER JOIN users
            ON posts.user_id = users.user_id
            ORDER BY post_id DESC
            LIMIT 10 OFFSET 10
            ");
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }
    public function get_prev_posts(){
        $stmt = $this->pdo->prepare("SELECT
            posts.post_id,
            posts.title,
            posts.body,
            posts.tags,
            posts.created,
            posts.user_id,
            users.firstname,
            users.lastname
            FROM posts
            INNER JOIN users
            ON posts.user_id = users.user_id
            ORDER BY post_id DESC
            LIMIT 10
            ");
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }
    public function delete_post($postId){
        $deletePage = $this->pdo->prepare(
        "DELETE FROM posts
        WHERE post_id = :id
        ");
        $deletePage->execute([':id' => $postId]);
    }
}

$POSTS = new Posts($pdo);