<?php
namespace models;
class Product extends DB
{
    public string $title;
    public string $price;
    public int $availability;

    public function __construct($data)
    {
        parent::__construct();

        $this->title = $data["title"];
        $this->price = $data["price"];
        $this->availability = $data["availability"];
    }

    public function save(): void
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO products (title, price, availability, created_at)
            VALUES (:title, :price, :availability, :created_at)
        ");

        $stmt->execute([
            ':title' => $this->title,
            ':price' => $this->price,
            ':availability' => $this->availability,
            ':created_at' => time(),
        ]);
    }

}