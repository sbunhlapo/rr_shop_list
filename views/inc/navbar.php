<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <div class="container">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>about">About</a>
        </li>
        
      </ul>
      <ul class="navbar-nav ml-auto">
      <?php if (isset($this->user)): ?>
           
      
      <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>products">My Products</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>logout" ><i class="fa fa-user" aria-hidden="true"></i> <?php echo '<span class="text-capitalize">'. $this->user['username'] .'</span> |   Logout <i class="fa fa-power-off" aria-hidden="true"></i>'; ?></a>
      </li>
        
      <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>register">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>login"> Login</a>
        </li>
        <?php endif; ?>  
      </ul>
    </div>
  </div>
</nav>