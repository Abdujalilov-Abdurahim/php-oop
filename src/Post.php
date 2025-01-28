<?php

class Post {

    public static $pdo;
    
    public $id;
    public $title;
    public $body;
    public $created_at;

    public static function getAll()
    {
        $statement = self::$pdo->prepare("SELECT * FROM posts");
        $statement->execute();
        $posts = $statement->fetchAll(PDO::FETCH_CLASS,"Post");

        return $posts;
    }

    public static function getById($id)
    {
        $statement = self::$pdo->prepare("SELECT * FROM posts WHERE id = :id");
        $statement->execute(([
            "id"=> $id
        ]));
        $post = $statement->fetchObject("Post");

        return $post;
    }

    public static function create($title, $body) 
    {
        $statement = self::$pdo->prepare("INSERT INTO posts (title, body) VALUES (:title , :body)");
        $statement->execute([
            "title"=> $title,
            "body" => $body
        ]);
        $row = $statement->rowCount();

        return $row;
    }

    public static function update($post_id, $title, $body) 
    {
        $statement = self::$pdo->prepare("UPDATE posts SET title = :title, body = :body WHERE id = :id");
        $statement->execute([
            "id" => $post_id,
            "title"=> $title,
            "body" => $body
        ]);
        $row = $statement->rowCount();

        return $row;
    }

    public static function Delete($id)
    {
        $statement = self::$pdo->prepare("DELETE FROM posts WHERE id= :id ");
        $statement->execute([
            "id"=> $id
        ]);
        $row = $statement->rowCount();
        return $row;
    }
}