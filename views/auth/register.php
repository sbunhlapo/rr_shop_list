<?php require_once __DIR__ . '/../../views/inc/header.php'; ?>

<div class="row">
  <div class="col-md-6 mx-auto">
      <?php if (isset($error)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
      <?php endif; ?>      
    <div class="card card-body bg-light mt-5">
        <h4>Create an account</h4>
        <p>Please fill this form to register</p>
      
          <form method="POST" action="<?php echo URLROOT ?>register"> 
              <input type="text" name="username" class="form-control form-control-md" placeholder="Username" required><br>
              <input type="email" name="email" class="form-control form-control-md" placeholder="Email" required><br>
              <input type="password" name="password" class="form-control form-control-md" placeholder="Password" required><br>
              <input type="password" name="confirm_password" class="form-control form-control-md" placeholder="Confirm Password" required><br>

              <div class="form-row">
                <div class="col">
                  <input type="submit" class="btn btn-success btn-block" value="Register">
                </div>
                <div class="col">
                  <a href="login" class="btn btn-light btn-block">Have an account? Login</a>
                </div>
              </div>

              
                           

          </form>
      </div>
    </div>    
</div>   
<?php require_once __DIR__ . '/../../views/inc/footer.php'; ?>