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

                <table class="table table-bordered table-hover dataTable table-striped width-full">
                    <thead>
                        <tr>
                            <th>Page</th>
                            <th>Order</th>
                            <th>Ad</th>
                            <th>Redirect URL</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Page</th>
                            <th>Order</th>
                            <th>Ad</th>
                            <th>Redirect URL</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (count($ads) > 0) {
                            foreach ($ads as $q): ?>
                                <tr id="<?='row-'.$q['ad_id']?>">
                                    <td><?=$q['type']?></td>
                                    <td><?=$q['order']?></td>
                                    <td><img src="<?=UPLOADS.$q['image']?>" width="200"></td>
                                    <td><a href="<?=$q['link']?>" target="_blank"><?=$q['link']?></a></td>
                                    <td class="actions"><a href="javascript://" data-id="<?=$q['ad_id']?>" data-image="<?=$q['image']?>" data-order="<?=$q['order']?>" data-type="<?=$q['type']?>" data-link="<?=$q['link']?>"  class="edit-ad btn btn-sm btn-icon btn-pure btn-default on-default edit-row" data-toggle="tooltip" data-original-title="Edit"><i class="icon md-edit" aria-hidden="true"></i></a></td>
                                </tr>
                                <?php endforeach;
                        } //end if
                        else {
                            ?>
                            <tr>
                                <td>
                                    No Ad found in the database
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

    $(document).on('click', '.edit-ad', function(event) {
        event.preventDefault();
        $this = $(this);
        $("input[name='id']").val($this.attr('data-id'));
        $("input.input-type").val($this.attr('data-type'));
        $("input.input-order").val($this.attr('data-order'));
        $("input[name='link']").val($this.attr('data-link'));
        if ($this.attr('data-image').length > 4) {
            $("#input-file-2").attr('data-default-file', '<?=UPLOADS?>'+$this.attr('data-image'));
            $(".image-2").val($this.attr('data-image'));
            $(".show-edit-image").prop('src', '<?=UPLOADS?>'+$this.attr('data-image'));
        }
        $("#edit-modal").modal('show');
    });

    $(document).on('submit', '#edit-form', function(event) {
        event.preventDefault();
        $form = $(this);
        $.post('<?=BASEURL."admin/update-ad-ajax"?>', {data: $form.serialize()}, function(resp) {
            resp = JSON.parse(resp);
            alert(resp.msg);
            if (resp.status == true) {
                $(resp.rowId).html(resp.html);
                $("#edit-modal").modal('hide');
            }

        });
    });

    $("#input-file-2").on('change',function(){
        var data = new FormData();
        data.append('img', $(this).prop('files')[0]);
        $(".theatre-cover").fadeIn(300);
        $.ajax({
            type: 'POST',
            processData: false,
            contentType: false,
            data: data,
            url: '<?=BASEURL?>admin/post-photo-ajax',
            dataType : 'json',
            success: function(resp){
                $(".theatre-cover").fadeOut(300);
                if (resp.status == true)
                {
                    $(".image-2").val(resp.data);
                    $(".show-edit-image").prop('src', '<?=UPLOADS?>'+resp.data);
                }
                else
                {
                    alert(resp.msg)
                }
            }
        });
    });//#input-file-2


});
</script>


<div class="modal fade" id="edit-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Ad</h4>
            </div>
            <div class="modal-body">
                
                <form id="edit-form">

                    <input type="hidden" name="id">
                    
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control input-type" readonly>
                    </div><!-- /form-group -->

                    <div class="form-group">
                        <label>Order</label>
                        <input type="text" class="form-control input-order" readonly>
                    </div><!-- /form-group -->
                
                    <div class="form-group">
                        <label>Redirect URL<span class="required">*</span></label>
                        <input type="text" class="form-control" name="link" placeholder="Redirect URL" required="">
                    </div><!-- /form-group -->

                    <div class="col-lg-12 form-horizontal">
                        <div class="example-wrap">
                            <h4 class="example-title">AD</h4>
                            <div class="example">
                                <img src="" class="show-edit-image" style="width: 100%;margin-bottom: 5px;">
                                <input type="file" id="input-file-2" data-plugin="dropify" data-default-file=""/>
                                <input type="text" name="image" class="image-2" hidden>
                            </div><!-- /example -->
                        </div><!-- /example-wrap -->
                    </div><!-- /12/form-horizontal -->

                    <div class="form-group form-material col-lg-12 text-right padding-top-m">
                        <button type="submit" class="btn btn-primary" id="validateButton1">Update</button>
                    </div><!-- /form-group -->

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- #add-modal -->


