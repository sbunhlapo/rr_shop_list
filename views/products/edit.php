<?php require_once __DIR__ . '/../../views/inc/header.php'; ?>

<div class="row">
  <div class="col-md-8 mx-auto">
    <div class="card mt-5">
        <div class="card-header">
              <div class="row">
                  <div class="col">
                    <?php echo $product['title']; ?>
                    
                  </div>
              
                  <div class="col">
                    <a class="btn btn-sm btn-primary" href="<?php echo URLROOT; ?>products" style="float: right">Back</a>
                  </div>
              </div>

        </div>

        <div class="card-body">
          <form method="POST" action="<?php echo URLROOT ?>products/edit?id=<?php echo $product['id']; ?>">
          <div class="mb-3">
            <label for="content" class="form-label">Product Name</label>
            <input type="text" name="title" class="form-control form-control-md" value="<?php echo $product['title']; ?>" required>
          </div>

          <div class="row mb-3">
            <div class="col">
              <label for="start" class="form-label">Date Bought</label>
              <input type="date" name="start_date" class="form-control form-control-md" value="<?php echo $product['start_date']; ?>" required>
            </div>

            <div class="col">
              <label for="end" class="form-label">Expiry Date</label>
              <input type="date" name="end_date" class="form-control form-control-md" value="<?php echo $product['end_date']; ?>" required>
            </div>
          </div>


          <div class="mb-3"> 
            <label for="status" class="form-label">Product Status</label>
            <select class="form-select form-control" name="status" aria-label="Status" required>
              <option selected><?php echo $product['status']; ?></option>
              <option value="Checked">Checked</option>
              <option value="Expired">Expired</option>
              <option value="Finished">Finished</option>
            </select>
          </div>

            <div class="mb-3">
              <label for="body" class="form-label">Description (Optional) </label>
              <textarea name="body" placeholder="Content" class="form-control form-control-md"><?php echo htmlspecialchars($product['body']); ?>
              </textarea>
            </div>
            <button class="btn btn-md btn-success" type="submit">Update</button>
          </form>
        </div>


    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../../views/inc/footer.php'; ?>