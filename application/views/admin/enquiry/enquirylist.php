

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
                                                        <th>Product Name</th>
                                                        <th>Customer Name</th>
                                                        <th>Mobile</th>
                                                        <th>Email</th>
                                                        <th>Query</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        if(is_array($enquiries)){$i=0;
                                                            foreach($enquiries as $enquiry){ $i++;
                                                    ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $enquiry['product']; ?></td>
                                                        <td><?= $enquiry['name']; ?></td>
                                                        <td><?= $enquiry['mobile']; ?></td>
                                                        <td><?= $enquiry['email'];?></td>
                                                        <td><?= $enquiry['query'];?></td>
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
        $('#table').dataTable({
            dom: 'Bfrtip',
            buttons: ['excel']
        });
    });
</script>