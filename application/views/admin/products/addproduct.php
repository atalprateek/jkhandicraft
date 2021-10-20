

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
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <?= form_open_multipart('admin/products/saveproduct/'); ?>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Product Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="name" id="name" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Slug</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="slug" id="slug" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Product No.</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="sku" id="sku" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Unit</label>
                                                <div class="col-sm-10">
                                                    <?= form_dropdown('unit_id',$units,'',array('class'=>'form-control','required'=>"true","id"=>"unit_id")); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Category</label>
                                                <div class="col-sm-10">
                                                    <?= form_dropdown('category',$category,'',array('class'=>'form-control','required'=>"true","id"=>'category')); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Sub Category</label>
                                                <div class="col-sm-10">
                                                    <?= form_dropdown('subcategory',array(""=>"Select Sub-Category"),'',array('class'=>'form-control',"id"=>'subcategory')); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Short Description</label>
                                                <div class="col-sm-10">
                                                    <textarea name="short_description" id="short_description" class="form-control" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Description</label>
                                                <div class="col-sm-10">
                                                    <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Image</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="image" id="image" onChange="getPhoto(this)" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Price <span id="perunit"></span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="price" id="price" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Discount(%)</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" name="discount" id="discount" value="0">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Initial Stock Quantity<span id="qunit"></span></label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" name="quantity" id="quantity">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <input type="submit" class="btn btn-success waves-effect waves-light" name="saveproduct" value="Save Product">
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
                $('#perunit').text(' / '+unit);
                $('#qunit').text(' (in '+unit+')');
            }
            else{
                $('#perunit').text(unit);
                $('#qunit').text(unit);
            }
        });
        $('#category').change(function(){
            var parent_id=$(this).val();
            $.ajax({
                type:"post",
                url:"<?= admin_url('products/getsubcategory/'); ?>",
                data:{parent_id:parent_id},
                success:function(data){
                    $('#subcategory').replaceWith(data);
                }
            });
        });
    });
function getPhoto(input){
    
}
</script>