

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
                                        <?= form_open_multipart('admin/products/addunit/'); ?>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Unit</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="unit" id="unit" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <input type="hidden" name="id" id="id">
                                                    <input type="submit" class="btn btn-success waves-effect waves-light" name="addunit" value="Save Unit">
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
                                                        <th>Unit</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        if(!empty($units) && is_array($units)){$i=0;
                                                            foreach($units as $unit){ 
                                                                $i++;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $unit['unit']; ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-xs btn-info edit-btn" value="<?= $unit['id']; ?>" data-value="<?= $unit['unit']; ?>"><i class="fa fa-edit"></i></button>
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
        $('table').on('click','.edit-btn',function(){
            var id=$(this).val();
            var unit=$(this).data('value');
            $('#id').val(id);
            $('#unit').val(unit);
            $('.cancel-btn').removeClass('hidden');
            $('input[name="addunit"]').attr('name','updateunit').val('Update Unit');
            $('form').attr('action','<?= admin_url('products/updateunit/'); ?>');
        });
        $('.cancel-btn').click(function(){
            $('#unit,#id').val('');
            $('.cancel-btn').addClass('hidden');
            $('input[name="updateunit"]').attr('name','addunit').val('Save unit');
            $('form').attr('action','<?= admin_url('products/addunit/'); ?>');
        });
    });
function getPhoto(input){
    
}
</script>