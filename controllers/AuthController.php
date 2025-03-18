<?php

require_once __DIR__ . '/BaseController.php'; 
require_once __DIR__ . '/../models/UserModel.php';

class AuthController extends BaseController {
    private $userModel;

    public function __construct($pdo) {
        parent::__construct($pdo);
        $this->userModel = new UserModel($pdo);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];
            $email = $_POST['email'];

            if (strlen($password) < 6) {
                $error = "Password must be at least 6 characters.";
            } elseif ($password !== $confirmPassword) {
                $error = "Passwords do not match.";
            } else {
                try {
                    if ($this->userModel->createUser($username, $password, $email)) {
                        header("Location: /demos/mishoppi/public/login");
                        exit;
                    } else {
                        $error = "Registration failed.";
                    }
                } catch (PDOException $e) {
                    if ($e->getCode() == 23000) { // Duplicate entry error code
                        if (strpos($e->getMessage(), 'username') !== false) {
                            $error = "Username already exists. Try again!";
                        } elseif (strpos($e->getMessage(), 'email') !== false) {
                            $error = "Try a different email address.";
                        } else {
                            $error = "Registration failed due to a database error.";
                        }
                    } else {
                        $error = "Registration failed due to a database error.";
                    }
                }
            }
            if (isset($error)){
                require_once __DIR__ . '/../views/auth/register.php';
            }
        } else {
            require_once __DIR__ . '/../views/auth/register.php';
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->getUserByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                header("Location: /demos/mishoppi/");
                exit;
            } else {
                $error = "Incorrect username or password.";
                require_once __DIR__ . '/../views/auth/login.php';
            }
        } else {
            require_once __DIR__ . '/../views/auth/login.php';
        }
    }

    

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /demos/mishoppi/");
        exit;
    }
}