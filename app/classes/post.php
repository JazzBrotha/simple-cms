<?php

// Class posts handles creation and modification of ONE specific post

class Post {
    public $userId;
    public $title;
    public $body;
    public $tags;
    public $pdo;

    public function __CONSTRUCT($userId, $title, $body, $tags, $pdo) {
        $this->userId = $userId;
        $this->title = noScript($title);
        $this->body = noScript($body);
        $this->tags = noScript($tags);
        $this->pdo = $pdo;
    }

    public function store_post(){
        $store = $this->pdo->prepare(
            "INSERT INTO posts
            (user_id, title, body, tags) 
            VALUES 
            (:userId, :title, :body, :tags)");
        
        return $store->execute([
            ':userId' => $this->userId,
            ':title' => $this->title,
            ':body' => $this->body,
            ':tags' => $this->tags
        ]);
    }

    public function update_post($postId){
        $update = $this->pdo->prepare(
            "UPDATE posts
            SET
            title = :title,
            body = :body,
            tags = :tags,
            updated = NOW()
            WHERE post_id = :post_id
            AND user_id = :user_id
            ");
        
        return $update->execute([
            ':title' => $this->title,
            ':body' => $this->body,
            ':tags' => $this->tags,
            ':post_id' => $postId,
            ':user_id' => $this->userId
        ]);
        
    }
}