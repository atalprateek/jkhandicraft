

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
                                    <div class="col-md-6">
                                        <?= form_open_multipart('admin/products/addsubcategory/'); ?>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Sub Category</label>
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
                                                <label class="col-sm-2 col-form-label">Category</label>
                                                <div class="col-sm-10">
                                                    <select name="parent_id" class="form-control fill" id="parent_id">
                                                        <option value="">Select Parent</option>
                                                        <?php
                                                                $parent=array("");
                                                                $headings=array();
                                                                if($categories!==NULL){
                                                                    foreach($categories as $category){
                                                                        if($category['parent_id']!=0){continue;}
                                                                        else{
                                                                            $parent[$category['id']]=$category['name'];
                                                                            $headings[$category['id']]=$category['headings'];
                                                                            echo "<option value='$category[id]'>$category[name]</option>";
                                                                        }
                                                                    }
                                                                }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Heading</label>
                                                <div class="col-sm-10">
                                                    <select name="headings" class="form-control fill" id="headings">
                                                        <option value="">Select Heading</option>
                                                    </select>
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
                                                    <input type="file" name="image" id="image" onChange="getPhoto(this)">
                                                    <input type="hidden" name="id" id="id">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <input type="submit" class="btn btn-success waves-effect waves-light" name="addsubcategory" value="Save Sub Category">
                                                    <button type="button" class="btn btn-danger waves-effect waves-light cancel-btn hidden">Cancel</button>
                                                </div>
                                            </div>
                                        <?= form_close(); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="table-responsive">
                                            <table class="table table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th>Sl.No.</th>
                                                        <th>Image</th>
                                                        <th>Category</th>
                                                        <th>Parent</th>
                                                        <th>Headings</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        if($subcategories){$i=0;
                                                            foreach($subcategories as $subcategory){ $i++;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><img src="<?php echo $subcategory['image']; ?>" height="50" width="50" alt=""></td>
                                                        <td><?php echo $subcategory['name']; ?></td>
                                                        <td><?php echo $parent[$subcategory['parent_id']]; ?></td>
                                                        <td><?php echo $subcategory['headings']; ?></td>
                                                        <td><button type="button" class="btn btn-xs btn-info edit-btn" value="<?php echo $subcategory['id']; ?>"><i class="fa fa-edit"></i></button></td>
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
<div class="hidden" id="allheadings"><?= json_encode($headings); ?></div>
<script>
	$(document).ready(function(e) {
		$('#name').keyup(function(){
			//if($('#id').val()==''){
				var name=$(this).val();
				$.ajax({
					type:"POST",
					url:"<?= admin_url('products/getslug/'); ?>",
					data:{name:name},
					success: function(data){
						$('#slug').val(data);
					}
				});
			//}
		});
        $('body').on('change','#parent_id',function(){
            var options='<option value="">Select Heading</option>';
            var parent_id=$(this).val();
            if(parent_id!=''){
                var allheadings=JSON.parse($('#allheadings').text());
                if(allheadings[parent_id]!==''){
                    var headings=JSON.parse(allheadings[parent_id]);
                    for (var key in headings) {
                        options+='<option value="'+key+'">'+headings[key]+'</option>';
                    }
                }
            }
            $('#headings').html(options);
            $('#headings').val($('#headings').data('val'));
            $('#headings').removeAttr('data-val');
        });
        $('table').on('click','.edit-btn',function(){
            $('#parent_id option').show();
            $('#headings').removeAttr('data-val');
            $.ajax({
                type:"post",
                url:"<?= admin_url('products/getcategory/'); ?>",
                data:{id:$(this).val()},
                success:function(data){
                    data=JSON.parse(data);
                    $('#name').val(data['name']);
                    $('#slug').val(data['slug']);
                    if(data['parent_id']==0){ data['parent_id']=''; }
                    $('#parent_id').val(data['parent_id']).trigger('change');
                    $('#description').val(data['description']);
                    $('#id').val(data['id']);
                    $('#headings').attr('data-val',data['headings']);
                    $('#headings').val(data['headings'])
                    $('.cancel-btn').removeClass('hidden');
                    $('input[name="addsubcategory"]').attr('name','updatesubcategory').val('Update Sub Category');
                    $('form').attr('action','<?= admin_url('products/updatesubcategory/'); ?>');
                    $('#parent_id').find('option[value="'+data['id']+'"]').hide();
                }
            });
        });
        $('.cancel-btn').click(function(){
            $('#name,#slug,#parent_id,#description,#id,#image').val('');
            $('.cancel-btn').addClass('hidden');
            $('input[name="updatesubcategory"]').attr('name','addsubcategory').val('Save Sub Category');
            $('form').attr('action','<?= admin_url('products/addsubcategory/'); ?>');
            $('#parent_id option').show();
        });
    });
function getPhoto(input){
    
}
</script>