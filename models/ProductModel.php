<?php

class ProductModel {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function createProduct($userId, $title, $body, $startDate, $endDate, $status) {
        $stmt = $this->db->prepare("INSERT INTO products (user_id, title, body, start_date, end_date, status) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$userId, $title, $body, $startDate, $endDate, $status]);
    }

    public function getProductsByUserId($userId) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductByIdAndUserId($id, $userId) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ? AND user_id = ?");
        $stmt->execute([$id, $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProduct($id, $userId, $title, $body, $start_date, $end_date, $status) {
        $stmt = $this->db->prepare("UPDATE products SET title = ?, body = ?, start_date = ?, end_date = ?, status = ? WHERE id = ? AND user_id = ?");
        return $stmt->execute([$title, $body, $start_date, $end_date, $status, $id, $userId]);
    }

    public function deleteProduct($id, $userId) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = ? AND user_id = ?");
        return $stmt->execute([$id, $userId]);
    }
}