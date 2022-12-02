<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title"><?=$page_title?></h1>
        <ol class="breadcrumb">
            <li><a href="<?=BASEURL?>admin">Admin</a></li>
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
                <div class="row">
                    <div class="col-sm-6">
                        <div class="margin-bottom-15">
                            <button id="addToTable" class="btn btn-primary" type="button" onClick="document.location='<?=BASEURL?>warehouse/add-supply';">
                                <i class="icon md-plus" aria-hidden="true"></i> Add Supply
                            </button>
                        </div><!-- /margin-bottom-15 -->
                    </div><!-- /6 -->
                </div><!-- /row -->
                <table class="table table-bordered table-hover dataTable table-striped width-full" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Supplier</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total PRice</th>
                            <th>AT</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Supplier</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total PRice</th>
                            <th>AT</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (count($suppliers) > 0) {
                            foreach ($suppliers as $q): ?>
                                <tr>
                                    <td><?=$q['supply_id']?></td>
                                    <td><?=$q['company']?></td>
                                    <td><?=$q['product']?></td>
                                    <td><?=$q['qty']?></td>
                                    <td><?=$q['single_price']?></td>
                                    <td><?=$q['total_price']?></td>
                                    <td><?=$q['at']?></td>
                                </tr>
                            <?php endforeach;
                        } //end if
                        else {
                            ?>
                            <tr>
                                <td>
                                    No Supply found in the database
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
    $(document).on('change', 'select[name="status"]', function(event) {
        event.preventDefault();
        $this = $(this);
        $id = $this.attr('data-id');
        $status = $this.val();
        $.post('<?=BASEURL."warehouse/change-supplier-status"?>', {status: $status, id: $id}, function(resp) {
            resp = JSON.parse(resp);
            alert(resp.msg);
            location.reload();
        });
    });
});
</script>

