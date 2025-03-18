<?php

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/PageModel.php';

class PageController extends BaseController {
    private $model;
   
    public function __construct($pdo) {
        parent::__construct($pdo); 
        $this->model = new PageModel($pdo);
    }

    public function home() {
        $message = $this->model->getMessage();
        require_once __DIR__ . '/../views/home.php';
    }

    public function about() {
      
        require_once __DIR__ . '/../views/about.php';
    }
}