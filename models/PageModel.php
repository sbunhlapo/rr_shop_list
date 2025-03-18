<?php

class PageModel {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function getMessage() {
        $stmt = $this->db->query("SELECT content FROM messages WHERE id=2");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['content'];
    }
}