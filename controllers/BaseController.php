<?php

require_once __DIR__ . '/../models/UserModel.php';

class BaseController {
    protected $pdo;
    protected $user;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->user = $this->getUser();
    }

    protected function getUser() {
        if (isset($_SESSION['user_id'])) {
            $userModel = new UserModel($this->pdo);
            return $userModel->getUserById($_SESSION['user_id']);
        }
        return null;
    }
}


