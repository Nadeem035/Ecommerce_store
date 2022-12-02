<script type="text/javascript">
    function del_q(id) {
        cnfr = confirm("Are you sure you want to delete this Supplier");
        if (cnfr) {
            document.location = "<?=BASEURL?>warehouse/delete-supplier/?id=" + id;
        }
    }
</script>
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
                            <button id="addToTable" class="btn btn-primary" type="button" onClick="document.location='<?=BASEURL?>warehouse/add-supplier';">
                                <i class="icon md-plus" aria-hidden="true"></i> Add Supplier
                            </button>
                        </div><!-- /margin-bottom-15 -->
                    </div><!-- /6 -->
                </div><!-- /row -->
                <table class="table table-bordered table-hover dataTable table-striped width-full" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (count($suppliers) > 0) {
                            foreach ($suppliers as $q): ?>
                                <tr>
                                    <td><?=$q['supplier_id']?></td>
                                    <td><?=$q['fname'].' '.$q['lname']?></td>
                                    <td><?=$q['company']?></td>
                                    <td><?=$q['address']?></td>
                                    <td><?=$q['phone']?></td>
                                    <td><?=$q['email']?></td>
                                    <td><?=$q['status']?></td>
                                    <td class="actions">
                                        <a href="<?=BASEURL?>warehouse/edit-supplier?id=<?=$q['supplier_id']?>" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" data-toggle="tooltip" data-original-title="Edit"><i class="icon md-edit" aria-hidden="true"></i></a>
                                        <a href="javascript:del_q('<?=$q['supplier_id']?>')" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row"><i class="icon md-delete" aria-hidden="true"></i></a><br>
                                        <select name="status" data-id="<?=$q['supplier_id']?>" class="form-control">
                                            <option value="">Change Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </td>
                                </tr>
                            <?php endforeach;
                        } //end if
                        else {
                            ?>
                            <tr>
                                <td>
                                    No Supplier found in the database
                                </td>
                                <td></td>
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

