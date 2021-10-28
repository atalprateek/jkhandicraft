
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header p-b-0">
                                <ul class="nav nav-tabs md-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link <?= !isset($_GET['images']) && !isset($_GET['packages'])?'active show':'' ?>" data-toggle="tab" href="#details" role="tab" aria-selected="false">Product Details</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?= isset($_GET['images'])?'active show':'' ?>" data-toggle="tab" href="#images" role="tab" aria-selected="true">Product Images</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item d-none">
                                        <a class="nav-link <?= isset($_GET['packages'])?'active show':'' ?>" data-toggle="tab" href="#packages" role="tab" aria-selected="true">Product Packages</a>
                                        <div class="slide"></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-block tab-content p-t-20">
                                <div class="tab-pane fade <?= !isset($_GET['images']) && !isset($_GET['packages'])?'active show':'' ?>" id="details" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <?= form_open_multipart('admin/products/updateproduct/'); ?>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">SKU</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="sku" id="sku" value="<?= $product['sku']; ?>" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Product Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="name" id="name" required value="<?= $product['name']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Slug</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="slug" id="slug" required value="<?= $product['slug']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Manufacturer</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="manufacturer" id="manufacturer" value="<?= $product['manufacturer']; ?>" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Manufacturer Country</label>
                                                    <div class="col-sm-10">
                                                        <?php 
                                                            echo form_dropdown('mcountry',array("India"=>"India","Outside India"=>"Outside India"),$product['mcountry'],array('class'=>'form-control',"id"=>"mcountry")); 
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Seller SKU</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="sellersku" id="sellersku" value="<?= $product['sellersku']; ?>" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">HSN Code</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="hsn" id="hsn" value="<?= $product['hsn']; ?>" >
                                                    </div>
                                                </div>
                                                <div class="form-group row d-none">
                                                    <label class="col-sm-2 col-form-label">Unit</label>
                                                    <div class="col-sm-10">
                                                        <?= form_dropdown('unit_id',$units,$product['unit_id'],
                                                                          array('class'=>'form-control',"id"=>"unit_id")); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Category</label>
                                                    <div class="col-sm-10">
                                                        <?= form_dropdown('category',$category,$product['category_id'],array('class'=>'form-control','required'=>"true","id"=>'category')); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Sub Category</label>
                                                    <div class="col-sm-10">
                                                        <?= form_dropdown('subcategory',$subcategory,$product['subcategory_id'],array('class'=>'form-control',"id"=>'subcategory')); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Short Description</label>
                                                    <div class="col-sm-10">
                                                        <textarea name="short_description" id="short_description" class="form-control" rows="3"><?= $product['short_description']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Description</label>
                                                    <div class="col-sm-10">
                                                        <textarea name="description" id="description" class="form-control" rows="3"><?= $product['description']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Price </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="price" id="price" required value="<?= $product['price']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row d-none">
                                                    <label class="col-sm-2 col-form-label">Discount(%)</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" name="discount" id="discount" value="<?= $product['discount']; ?>">
                                                        <input type="hidden" name="id" value="<?= $product['id']; ?>">
                                                    </div>
                                                </div>
                                                <?php
                                                    $available=$product['available'];
                                                    $a=$f=$s="";
                                                    if(strpos($available,"Amazon")!==false){ $a="checked"; }
                                                    if(strpos($available,"Flipkart")!==false){ $f="checked"; }
                                                    if(strpos($available,"Snapdeal")!==false){ $s="checked"; }
                                                ?>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Product Available @</label>
                                                    <div class="col-sm-10">
                                                        <div class="border-checkbox-section">
                                                            <div class="border-checkbox-group border-checkbox-group-primary">
                                                                <input class="border-checkbox" name="available[]" type="checkbox" id="checkbox0" value="Amazon" <?= $a; ?>>
                                                                <label class="border-checkbox-label" for="checkbox0">Amazon</label>
                                                            </div>
                                                            <div class="border-checkbox-group border-checkbox-group-primary">
                                                                <input class="border-checkbox" name="available[]" type="checkbox" id="checkbox1" value="Flipkart" <?= $f; ?>>
                                                                <label class="border-checkbox-label" for="checkbox1">Flipkart</label>
                                                            </div>
                                                            <div class="border-checkbox-group border-checkbox-group-primary">
                                                                <input class="border-checkbox" name="available[]" type="checkbox" id="checkbox2" value="Snapdeal" <?= $s; ?>>
                                                                <label class="border-checkbox-label" for="checkbox2">Snapdeal</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label"></label>
                                                    <div class="col-sm-10">
                                                        <input type="submit" class="btn btn-success waves-effect waves-light" name="updateproduct" value="Update Product">
                                                        <a href="<?= admin_url('products/'); ?>" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                                    </div>
                                                </div>
                                            <?= form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade <?= isset($_GET['images'])?'active show':'' ?>" id="images" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-sm">
                                                    <tbody>
                                                        <?php
                                                        if(!empty($productimages) && is_array($productimages)){
                                                            foreach($productimages as $productimage){
                                                        ?>
                                                        <tr>
                                                            <td><img src="<?= $productimage['image']; ?>" alt="" height="120"></td>
                                                            <td class="td-center">
                                                                <button type="button" class="btn btn-primary waves-effect view-image" data-toggle="modal" data-target="#large-Modal" data-src="<?= $productimage['image']; ?>">View</button>
                                                            </td>
                                                            <td class="td-center">
                                                                <button type="button" class="btn btn-danger waves-effect delete-image" data-imgid="<?= $productimage['id']; ?>">Delete</button>
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
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <?= form_open_multipart('admin/products/addimages/'); ?>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Image</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" name="image[]" data-maxupload="4" multiple required>
                                                        <p class="help-block">*Max 4 Images at a time.</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label"></label>
                                                    <div class="col-sm-10">
                                                        <input type="hidden" name="slug" value="<?= $product['slug']; ?>">
                                                        <input type="hidden" name="id" value="<?= $product['id']; ?>">
                                                        <input type="submit" class="btn btn-success waves-effect waves-light" name="addimages" value="Upload Images">
                                                        <a href="<?= admin_url('products/'); ?>" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                                    </div>
                                                </div>
                                            <?= form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade <?= isset($_GET['packages'])?'active show':'' ?>" id="packages" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <?= form_open('admin/products/savepackages/'); ?>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Quantity (in <?= $product['unit']; ?>)</th>
                                                            <th>Price / <?= $product['unit']; ?></th>
                                                            <th>Discount</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            if($productpackages['status']===true){
                                                                foreach($productpackages['packages'] as $package){
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <input type="number" name="quantity[]" class="form-control" value="<?= $package['quantity']; ?>" required min="1">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="price[]" class="form-control" value="<?= $package['price'] ?>" required min="1">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="discount[]" class="form-control" value="<?= $package['discount'] ?>" required min="0">
                                                                <input type="hidden" name="package_id[]" class="form-control" value="<?= $package['id']; ?>" required>
                                                                <input type="hidden" name="todel[]" class="form-control" value="no" required>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-danger delete-btn">Delete</button>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                                }
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <input type="number" name="quantity[]" class="form-control" min="1">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="price[]" class="form-control" min="1">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="discount[]" class="form-control" min="0" value="0">
                                                                <input type="hidden" name="package_id[]" class="form-control">
                                                                <input type="hidden" name="todel[]" class="form-control">
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary add-btn">Add</button>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                            }
                                                            else{
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <input type="number" name="quantity[]" class="form-control" value="1" required min="1">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="price[]" class="form-control" value="<?= $product['price'] ?>" required min="1">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="discount[]" class="form-control" value="<?= $product['discount'] ?>" required min="0">
                                                                <input type="hidden" name="package_id[]" class="form-control" required>
                                                                <input type="hidden" name="todel[]" class="form-control" required>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary add-btn">Add</button>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label"></label>
                                                    <div class="col-sm-10">
                                                        <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                                                        <input type="submit" class="btn btn-success waves-effect waves-light" name="savepackages" value="Save Packages">
                                                        <a href="<?= admin_url('products/'); ?>" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                                    </div>
                                                </div>
                                            <?= form_close(); ?>
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

<div class="modal fade" id="large-Modal" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img src="" alt="" id="preview" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	$(document).ready(function(e) {
        $('#name').keyup(function(){
            var name=$(this).val();
            $.ajax({
                type:"POST",
                url:"<?= admin_url('products/getslug/'); ?>",
                data:{name:name},
                success: function(data){
                    $('#slug').val(data);
                }
            });
		});
        $('#unit_id').change(function(){
            var unit='';
            if($(this).val()!=''){
                unit=$(this).find('option:selected').text();
                unit=' / '+unit;
            }
            $('#perunit').text(unit);
        });
        $('#images').on('click','.view-image',function(){
            $('#preview').attr("src",$(this).data('src'));
        });
        $('#images').on('click','.delete-image',function(){
            var id=$(this).data('imgid');
            if($('.delete-image').length>1){
                if(confirm("Are you sure you want to Delete this Image?")){
                    $.ajax({
                        type:"post",
                        url:'<?= admin_url('products/deleteimage/'); ?>',
                        data:{id:id,deleteimage:'deleteimage'},
                        success:function(data){
                            var url=window.location.href;
                            var qpos=url.indexOf("?");
                            if(qpos!=-1){
                               url=url.substr(0,qpos);
                            }
                            url+='?images';
                            window.location=url;
                        }
                    });
                }
            }
            else{
                alert('You cannot delete this image!');
            }
        });
		$("input[type='file'][name='image[]']").change(function(){
			var maxUpload=$(this).data('maxupload');
			if (parseInt($(this).get(0).files.length)>maxUpload){
				$(this).val('');
				alert("You can only upload a maximum of "+maxUpload+" files");
			}
		});    
        $('#packages').on('click','.add-btn',function(){
            var tr='<tr>'+$(this).closest('tr').html()+'</tr>';
            $(this).closest('tbody').append(tr);
            $(this).closest('tbody').children().last().find('input').val('');
            $(this).closest('tbody').children().last().find('button').text('Remove').removeClass('add-btn btn-primary').addClass('remove-btn btn-danger');
        });
        $('#packages').on('click','.remove-btn',function(){
            $(this).closest('tr').remove();
        });
        $('#packages').on('click','.delete-btn',function(){
            $(this).closest('td').prev().find('input[name="todel[]"]').val('yes').closest('tr').hide();
            if($('.delete-btn:visible').length==0){
                $(this).closest('tbody').children().last().find('input').attr('required',true);
            }
        });
        $('input[name="quantity[]"]').first().attr("readonly",true).closest('tr').find('.delete-btn').remove();
    });
function getPhoto(input){
    
}
</script>