<?php require_once __DIR__ . '/../../views/inc/header.php'; ?>

<div class="row">
  <div class="col-md-12 mx-auto">
    <div class="card mt-5">
        <div class="card-header">
                <div class="row">
                    <div class="col">Product List</div>
                    <div class="col" >
                        <a href="<?php echo URLROOT; ?>products/create" class="btn btn-success btn-sm" style="float: right"><i class="fa fa-plus"></i> Add Product</a>
                    </div>
                </div>
        </div>
        <div class="card-body">
        <table id="dataTable" class="display table" style="width:100%">
        <thead>
            <tr>
                <th>Product</th>
                <th>Bought</th>
                <th>Expiry Date</th>
                <th>Lifespan</th>
                <th>Status</th>
                <th style="text-align:right">:::</th>
                
            </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
            
            <tr>
                <td><strong><?php echo $product['title']; ?></strong></td>
                <td><?php echo $product['start_date_formatted']; ?></td>
                <td><?php echo $product['end_date_formatted']; ?></td>
                <td><?php echo $product['duration']; ?></td>
                <td><?php echo $product['status']; ?></td>
                <td align="right">
                    <a class="btn btn-sm btn-success" href="products/edit?id=<?php echo $product['id']; ?>"><i class="fa fa-edit"></i></a> 
                    <a class="btn btn-sm btn-danger" href="products/delete?id=<?php echo $product['id']; ?>" onclick="return confirm('Delete <?php echo $product['title']; ?>?')"><i class="fa fa-trash"></i></a>
                </td>
            </tr>    
        <?php endforeach; ?>    
        </tbody>
        
    </table>
        
        </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.html5.min.js"></script>

<script>
new DataTable('#dataTable', {
    layout: {
        topStart: {
            buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
        }
    }
});
</script>

<?php require_once __DIR__ . '/../../views/inc/footer.php'; ?>