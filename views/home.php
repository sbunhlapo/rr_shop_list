<?php require_once __DIR__ . '/../views/inc/header.php'; ?>

    <div class="jumbotron jumbotron-fluid mt-5">
        <div class="container text-center text-light">
        <h2 class="">Welcome to <?php echo SITENAME; ?></h2>
        <p class="text-light">A simple app to manage your grocery and shopping list!</p>
        </div>
    </div>
    
    <?php if (isset($this->user)): ?>
        <div class="row">
            <div class="col-12 mt-5 text-center">
                <p class="lead text-center">You are logged in as <?php echo '<span class="text-capitalize">'. $this->user['username'] .'</span>'; ?> </p>

                <a href="<?php echo URLROOT; ?>products" class="btn btn-success"> <i class="fa fa-shopping-cart"></i>     Go to your list</a>
            </div>
        </div>
    <?php endif; ?>      
    
      
    <?php if (!isset($this->user)): ?>
    <div class="row">
        <div class="col-12 mt-5 text-center">
            <a href="login" class="btn btn-success btn-lg">Login</a>
            <a href="register" class="btn btn-outline-success btn-lg">Register</a>
        </div>
    </div>
    <?php endif; ?>  
        
<?php require_once __DIR__ . '/../views/inc/footer.php'; ?>