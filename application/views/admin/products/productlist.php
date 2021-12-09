

<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5><?= $title; ?></h5>
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-condensed" id="table">
                                                <thead>
                                                    <tr>
                                                        <th>Sl.No.</th>
                                                        <th>Image</th>
                                                        <th>Product Name</th>
                                                        <th>Slug</th>
                                                        <th>Category</th>
                                                        <th>Price</th>
                                                        <!--<th>Discount</th>-->
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        if(is_array($products)){$i=0;
                                                            foreach($products as $product){ $i++;
                                                    ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><img src="<?= $product['image']; ?>" height="50" width="50"></td>
                                                        <td><?= $product['name']; ?></td>
                                                        <td><?= $product['slug']; ?></td>
                                                        <td><?= $product['category_name']; ?></td>
                                                        <td><?= $product['price'];//.' / '.$product['unit']; ?></td>
                                                        <!--<td><?= $product['discount']; ?></td>-->
                                                        <td>
                                                            <a href="<?= admin_url('products/editproduct/'.$product['slug'].'/'); ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
                                                            <?= form_open('admin/products/deleteproduct/','onSubmit="return validate()"'); ?>
                                                            <input type="hidden" name="id" value="<?= $product['id']; ?>">
                                                                <button type="submit" class="btn btn-danger btn-xs" name="deleteproduct" value="deleteproduct"><i class="fa fa-trash"></i></button>
                                                            <?= form_close(); ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
	$(document).ready(function(e) {
        $('#table').dataTable();
    });
    
    function validate(){
        if(!confirm("Are you sure you want to Delete this Product?")){
            return false;
        }   
    }
</script>