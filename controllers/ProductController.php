<?php

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/ProductModel.php';

class ProductController extends BaseController {
    private $productModel;

    public function __construct($pdo) {
        parent::__construct($pdo);
        $this->productModel = new ProductModel($pdo);
    }

    public function index() {
        if (!$this->user) {
            header("Location: /demos/mishoppi/public/login");
            exit;
        }
        $products = $this->productModel->getProductsByUserId($this->user['id']);
        
            foreach ($products as $key => $product) {
                if ($product['start_date']) {
                    $startDate = new DateTime($product['start_date']);
                    $products[$key]['start_date_formatted'] = $startDate->format('d M Y');
                } else {
                    $products[$key]['start_date_formatted'] = "N/A";
                }
        
                if ($product['end_date']) {
                    $endDate = new DateTime($product['end_date']);
                    $products[$key]['end_date_formatted'] = $endDate->format('d M Y');
                } else {
                    $products[$key]['end_date_formatted'] = "N/A";
                }
        
                if ($product['start_date'] && $product['end_date']) {
                    $startDate = new DateTime($product['start_date']);
                    $endDate = new DateTime($product['end_date']);
                    $interval = $startDate->diff($endDate);
                    $products[$key]['duration'] = $interval->format('%a days');
                } else {
                    $products[$key]['duration'] = "N/A";
                }
            }
        
        require_once __DIR__ . '/../views/products/index.php';
    }

    public function create() {
        if (!$this->user) {
            header("Location: /demos/mishoppi/public/login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $body = $_POST['body'];
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];
            $status = $_POST['status'];
            if ($this->productModel->createProduct($this->user['id'], $title, $body, $startDate, $endDate, $status)) {
                header("Location: /demos/mishoppi/public/products");
                exit;
            } else {
                echo "Error creating a product.";
            }
        } else {
            require_once __DIR__ . '/../views/products/create.php';
        }
    }

    public function edit($id) {
        $id = (int) $id;
        if (!$this->user) {
            header("Location: /demos/mishoppi/public/login");
            exit;
        }

        $product = $this->productModel->getProductByIdAndUserId($id, $this->user['id']);

        if (!$product) {
            echo "Product not found or unauthorized.";
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $body = $_POST['body'];
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];
            $status = $_POST['status'];
            if ($this->productModel->updateProduct($id, $this->user['id'], $title, $body, $startDate, $endDate, $status)) {
                header("Location: /demos/mishoppi/public/products");
                exit;
            } else {
                echo "Error updating a product!";
            }
        } else {
            require_once __DIR__ . '/../views/products/edit.php';
        }
    }

    public function delete($id) {
        $id = (int) $id;
        if (!$this->user) {
            header("Location: /demos/mishoppi/public/login");
            exit;
        }

        if ($this->productModel->deleteProduct($id, $this->user['id'])) {
            header("Location: /demos/mishoppi/public/products");
            exit;
        } else {
            echo "Error deleting a product!";
        }
    }
}