<script type="text/javascript">
    function del_q(id) {
        cnfr = confirm("Are you sure you want to delete this User");
        if (cnfr) {
            document.location = "<?=BASEURL?>admin/delete-user/?id=" + id;
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
                            <button id="addToTable" class="btn btn-primary" type="button" onClick="document.location='<?=BASEURL?>admin/add-user';">
                                <i class="icon md-plus" aria-hidden="true"></i> Add User
                            </button>
                        </div><!-- /margin-bottom-15 -->
                    </div><!-- /6 -->
                </div><!-- /row -->
                <table class="table table-bordered table-hover dataTable table-striped width-full" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Categories</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Categories</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (count($users) > 0) {
                            foreach ($users as $q): ?>
                                <tr>
                                    <td><?=$q['fname'].' '.$q['lname']?></td>
                                    <td><?=$q['phone']?></td>
                                    <td><a href="javascript://" class="btn btn-sm btn-icon btn-pure btn-default on-default get-cats" data-id="<?=$q['user_id']?>" data-name="<?=$q['fname'].' '.$q['lname']?>'s categories" data-cats="<?=$q['cats']?>"><i class="icon md-eye" aria-hidden="true"></i></a></td>
                                    <td><?=$q['status']?></td>
                                    <td class="actions">
                                        <a href="<?=BASEURL?>admin/edit-user?id=<?=$q['user_id']?>" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" data-toggle="tooltip" data-original-title="Edit"><i class="icon md-edit" aria-hidden="true"></i></a>
                                        <a href="javascript:del_q('<?=$q['user_id']?>')" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row"><i class="icon md-delete" aria-hidden="true"></i></a>
                                        <a href="<?=BASEURL?>user/admin-land?id=<?=$q['user_id']?>" target="_blank" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" data-toggle="tooltip" data-original-title="Edit"><i class="icon md-key" aria-hidden="true"></i></a> <br>
                                        <select name="status" data-id="<?=$q['user_id']?>" class="form-control">
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
                                    No User found in the database
                                </td>
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
        $.post('<?=BASEURL."admin/change-user-status"?>', {status: $status, id: $id}, function(resp) {
            resp = JSON.parse(resp);
            alert(resp.msg);
            location.reload();
        });
    });
    $(document).on('click', '.get-cats', function(event) {
        event.preventDefault();
        $this = $(this);
        $id = $this.attr('data-id');
        $cats = $this.attr('data-cats');
        $.post('<?=BASEURL."admin/get-user-cats"?>', {id: $id, cats: $cats}, function(resp) {
            resp = JSON.parse(resp);
            $("#modal-cats .modal-title").text($this.attr('data-name'));
            $("#modal-cats .save-cats").html(resp.html);
            $("#modal-cats").modal('show');
        });
    });
    $(document).on('submit', '.save-cats', function(event) {
        event.preventDefault();
        $form = $(this);
        $.post('<?=BASEURL."admin/post-user-cats-ajax"?>', {data: $form.serialize()}, function(resp) {
            resp = JSON.parse(resp);
            alert(resp.msg);
        });
    });
});
</script>


<div class="modal fade" id="modal-cats">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <form class="save-cats">
                    
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->