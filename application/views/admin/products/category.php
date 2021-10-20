

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
                                        <?= form_open_multipart('admin/products/addcategory/'); ?>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Category</label>
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
                                                <label class="col-sm-2 col-form-label">Parent</label>
                                                <div class="col-sm-10">
                                                    <select name="parent_id" class="form-control fill" id="parent_id">
                                                        <option value="">Select Parent</option>
                                                        <?php
                                                                $parent=array("");
                                                                if($categories!==NULL){
                                                                    foreach($categories as $category){
                                                                        if($category['parent_id']!=0){continue;}
                                                                        else{
                                                                            $parent[$category['id']]=$category['name'];
                                                                            echo "<option value='$category[id]'>$category[name]</option>";
                                                                        }
                                                                    }
                                                                }
                                                        ?>
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
                                                    <input type="submit" class="btn btn-success waves-effect waves-light" name="addcategory" value="Save Category">
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
                                                        <th>Slug</th>
                                                        <!--<th>Parent</th>-->
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        function treeview($array,$parent, $id = 0,$symbol=""){
                                                            static $slno=1;
                                                            for ($i = 0; $i < count($array); $i++){

                                                                if($array[$i]['parent_id']==$id) {
                                                                    $image=$array[$i]['image'];
                                                                    $name=$symbol.$array[$i]['name'];
                                                                    $slug=$array[$i]['slug'];
                                                                    $parent_id=$array[$i]['parent_id'];
                                                                    $row="<tr>";
                                                                    $row.="<td>".$slno."</td>";
                                                                    $row.="<td><img src='".$image."' height='50' width='50'></td>";
                                                                    $row.="<td>".$name."</td>";
                                                                    $row.="<td>".$slug."</td>";
                                                                    //$row.="<td>".$parent[$parent_id]."</td>";
                                                                    $row.="<td>";
                                                                    //$row.="<button type='button' class='btn btn-xs btn-primary view-btn' value='".$array[$i]['id']."'><i class='fa fa-eye'></i></button>";
                                                                    $row.=" <button type='button' class='btn btn-xs btn-info edit-btn' value='".$array[$i]['id']."'><i class='fa fa-edit'></i></button>";
                                                                    $row.="</td>";
                                                                    $row.="</tr>";
                                                                    $slno++;
                                                                    echo $row;
                                                                    treeview($array,$parent, $array[$i]['id'],"-- ");
                                                                }
                                                            }
                                                        }
                                                        treeview($categories,$parent);
                                                        if($categories===NULL){$i=0;
                                                            foreach($categories as $category){ $i++;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $category['image']; ?></td>
                                                        <td><?php echo $category['name']; ?></td>
                                                        <td><?php echo $category['slug']; ?></td>
                                                        <td><?php echo $parent[$category['parent_id']]; ?></td>
                                                        <td><button type="button" class="btn btn-xs btn-info edit-btn" value="<?php echo $category['id']; ?>"><i class="fa fa-edit"></i></button></td>
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
        $('table').on('click','.edit-btn',function(){
            $('#parent_id option').show();
            $.ajax({
                type:"post",
                url:"<?= admin_url('products/getcategory/'); ?>",
                data:{id:$(this).val()},
                success:function(data){
                    data=JSON.parse(data);
                    $('#name').val(data['name']);
                    $('#slug').val(data['slug']);
                    if(data['parent_id']==0){ data['parent_id']=''; }
                    $('#parent_id').val(data['parent_id']);
                    $('#description').val(data['description']);
                    $('#id').val(data['id']);
                    $('.cancel-btn').removeClass('hidden');
                    $('input[name="addcategory"]').attr('name','updatecategory').val('Update Category');
                    $('form').attr('action','<?= admin_url('products/updatecategory/'); ?>');
                    $('#parent_id').find('option[value="'+data['id']+'"]').hide();
                }
            });
        });
        $('.cancel-btn').click(function(){
            $('#name,#slug,#parent_id,#description,#id,#image').val('');
            $('.cancel-btn').addClass('hidden');
            $('input[name="updatecategory"]').attr('name','addcategory').val('Save Category');
            $('form').attr('action','<?= admin_url('products/addcategory/'); ?>');
            $('#parent_id option').show();
        });
    });
function getPhoto(input){
    
}
</script>