<?php
//Class Posts makes selections of posts from the DB

class Posts {
    public static function get_all_posts($pdo){
        $stmt = $pdo->prepare("SELECT 
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
            ON posts.user_id = users.user_id");
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }

    public static function get_full_post($pdo) {
        $post_id = $_GET['post_id'];
        $page = $pdo->prepare("SELECT * 
            FROM posts
            WHERE post_id = :id
            LIMIT 1
            ");
        $page->execute([':id' => $post_id]);
        $page = $page->fetch(PDO::FETCH_ASSOC);
        return $page;
    }

    //kanske bättre att kolla user id via session än skicka in i funktionen
    public static function get_user_posts($pdo, $user_id){
        $pages = $pdo->query("SELECT post_id, user_id, title, created
        FROM posts
        WHERE user_id = $user_id
        ORDER BY created DESC
        ")->fetchAll(PDO::FETCH_ASSOC);
        return $pages;

    }
}