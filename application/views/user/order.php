<script type="text/javascript">
    function del_q(id) {
        cnfr = confirm("Are you sure you want to delete this Order");
        if (cnfr) {
            document.location = "<?=BASEURL?>user/delete-order/?id=" + id;
        }
    }
</script>
<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title"><?=$page_title?></h1>
        <ol class="breadcrumb">
            <li><a href="<?=BASEURL?>user/order">Dashboard</a></li>
            <li><a href="<?=BASEURL.'user/order/all/'?>">All</a></li>
            <li><a href="<?=BASEURL.'user/order/new/'?>">New</a></li>
            <li><a href="<?=BASEURL.'user/order/reject/'?>">Reject</a></li>
            <li><a href="<?=BASEURL.'user/order/done/'?>">Done</a></li>
            <li><?=$page_title?></li>
        </ol>
        <div class="page-header-actions">
            <a class="btn btn-sm btn-primary btn-round" href="<?=BASEURL?>" target="_blank">
                <i class="icon md-link" aria-hidden="true"></i>
                <span class="hidden-xs">Website</span>
            </a>
        </div><!-- /page-header-actions -->
    </div><!-- /page-header -->
    <?php if ($msg_code): ?>
    <div class="bg-success well">
        <p><?=$msg_code?></p>
    </div>
    <?php endif;?>
    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">
                <div class="panel-actions"></div>
                <h3 class="panel-title">Data</h3>
            </header>
            <div class="panel-body">
                <table class="table table-bordered table-hover dataTable table-striped width-full" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Change Status</th>
                            <th>Name</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Product Link</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Change Status</th>
                            <th>Name</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Product Link</th>
                            <th>Date</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (count($order) > 0) {
                            foreach ($order as $q): ?>
                                <tr>
                                    <td><?=$q['order_id']?></td>
                                    <td><img src="<?=UPLOADS.$q['main_img']?>" width="100" alt=""></td>
                                    <td class="show-status">
                                        <?php
                                        switch ($q['status']) {
                                            case 'new':
                                                $class = 'primary';
                                                break;
                                            case 'process':
                                                $class = 'info';
                                                break;
                                            case 'reject':
                                                $class = 'danger';
                                                break;
                                            default:
                                                $class = 'success';
                                                break;
                                        }
                                        ?>
                                        <span class="label label-<?=$class?>"><?=strtoupper($q['status'])?></span>
                                    </td>
                                    <td>
                                        <?php if ($q['status'] == 'new'): ?>
                                            <select class="form-control input-sm change-order-status" data-order-id="<?=$q['order_detail_id']?>" width="70px">
                                                    <option value="">--Change Status--</option>
                                                    <option value="new" selected="selected">NEW</option>
                                                    <option value="done">DONE</option>
                                                    <option value="reject">REJECT</option>
                                            </select>
                                        <?php else: ?>
                                            <select class="form-control input-sm"  disabled>
                                                    <option value="">--Change Status--</option>
                                                    <option value="done">DONE</option>
                                                    <option value="reject">REJECT</option>
                                            </select>
                                        <?php endif ?>
                                    </td>
                                    <td><?=$q['name']?></td>
                                    <td><?=$q['size']?></td>
                                    <td><?=$q['color']?></td>
                                    <td><?=$q['qty']?></td>
                                    <td><?=$q['gross_price']?></td>
                                    <td><a href="<?=BASEURL.$q['slug']?>" target="_blank">Product Link</a></td>
                                    <td><?=date('d-m-Y',strtotime($q['at']))?></td>
                                </tr>
                                <?php endforeach;
                        }else {
                            ?>
                            <tr>
                                <td colspan="14">
                                    No Order found in the database
                                </td>
                            </tr>
                            <?php
                        }?>
                    </tbody>
                </table>
            </div><!-- /panel-body -->
        </div><!-- /panel -->
      <!-- End Panel Basic -->
    </div><!-- /page-content -->
</div><!-- /page/animsition -->


<script>
$(function(){
    $(".change-order-status").on('change',function(){
        $(".theatre-cover-loader").fadeIn(100);
        $this = $(this);
        var OrderID = $(this).attr('data-order-id');
        var Status = $(this).val();
        if (Status != '') {
            $.post('<?=BASEURL?>user/change-order-status', {id: OrderID,status: Status}, function(resp) {
                $(".theatre-cover-loader").fadeOut(100);
                // resp = JSON.parse(resp);
                resp = $.parseJSON(resp);
                if (resp.status == true) {
                    switch (Status) {
                        case 'new':
                            $class = 'primary';
                            break;
                        case 'process':
                            $class = 'info';
                            break;
                        case 'reject':
                            $class = 'danger';
                            break;
                        case 'return':
                            $class = 'danger';
                            break;
                        case 'delivery':
                            $class = 'warning';
                            break;
                        default:
                            $class = 'success';
                            break;
                    }
                    $this.parent('td').parent('tr').children('.show-status').html('<span class="label label-'+$class+'">'+Status.toUpperCase()+'</span>');
                    alert('status updated successfully');
                }
                else{
                    alert('status not updated please try again');
                }
            });
        }
    });


});//onload
</script>



<div class="modal fade bs-example-modal-lg" id="order-listing-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabe2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabe2">Products</h4>
            </div><!-- /modal-header -->
            <div class="modal-body">
                <!-- <div class="loading" align="center"><img src="<?=IMG?>loader.svg" alt=""></div> -->
                <div class="container">
                    <div class="row hotel-view">
                        <!-- some stuff comes from AJAX -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Main Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>View Product</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div><!-- /row -->
                </div><!-- /container -->
            </div><!-- /modal-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div><!-- /modal-footer -->
        </div><!-- /modal-content -->
    </div><!-- /modal-dialog -->
</div><!-- /modal -->