<script type="text/javascript">
    function del_q(id) {
        cnfr = confirm("Are you sure you want to delete this Product");
        if (cnfr) {
            document.location = "<?=BASEURL?>user/delete-product/?id=" + id;
        }
    }
</script>
<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title"><?=$page_title?></h1>
        <ol class="breadcrumb">
            <li><a href="<?=BASEURL?>user">Dashboard</a></li>
            <li><a href="<?=BASEURL.'user/products/all/'.$cat['sub_category_id']?>">All</a></li>
            <li><a href="<?=BASEURL.'user/products/active/'.$cat['sub_category_id']?>">Active</a></li>
            <li><a href="<?=BASEURL.'user/products/inactive/'.$cat['sub_category_id']?>">Inactive</a></li>
            <li><?=$page_title?></li>
        </ol>
        <div class="page-header-actions">
            <a class="btn btn-sm btn-success btn-round" href='<?=BASEURL."user/add-product/".$cat['sub_category_id']?>'>
                <i class="icon md-plus" aria-hidden="true"></i>
                <span class="hidden-xs">Add Product</span>
            </a>

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
                            <th>Title</th>
                            <th>QTY</th>
                            <th>Price</th>
                            <th>Images</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>QTY</th>
                            <th>Price</th>
                            <th>Images</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (count($products) > 0) {
                            foreach ($products as $q): ?>
                                <tr>
                                    <td><?=$q['product_id']?></td>
                                    <td><?=$q['title']?></td>
                                    <td><?=$q['qty']?></td>
                                    <td>
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Price</td>
                                                <td><?=number_format($q['price'])?></td>
                                            </tr>
                                            <tr>
                                                <td>Discount</td>
                                                <td><?=number_format($q['discount'])?></td>
                                            </tr>
                                            <tr>
                                                <td>Percentage</td>
                                                <td><?=$q['discount_percentage'].'%'?></td>
                                            </tr>
                                            <tr>
                                                <td>Final</td>
                                                <td><?=number_format($q['price']-$q['discount'])?></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td><a href="javascript://" class="get-photos" data-id="<?=$q['product_id']?>" data-title="<?=$q['title']?>"><i class="fa fa-plus"></i></a></td>
                                    <td><?=$q['status']?></td>
                                    <td class="actions">
                                        <a href="javascript:del_q('<?=$q['product_id']?>')" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row"><i class="icon md-delete" aria-hidden="true"></i></a>
                                        <a href="<?=BASEURL.'user/edit-product?id='.$q['product_id'].'/'?>" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row"><i class="icon md-edit" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach;
                        } //end if
                        else {
                            ?>
                            <tr>
                                <td>
                                    No Product found in the database
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

    $(document).on('click', '.get-photos', function(event) {
        event.preventDefault();
        $this = $(this);
        $("#modal-photos input[name='product_id']").val($this.attr('data-id'));
        $("#modal-photos .modal-title").text($this.attr('data-title'));
        $.post('<?=BASEURL."user/get-pro-photos"?>', {id: $this.attr('data-id')}, function(resp) {
            resp = JSON.parse(resp);
            $("#modal-photos tbody").html(resp.data);
            $("#modal-photos").modal('show');
        });
    });

    $("#post_photo_form").on('change',function(){
        var fd = new FormData();
        var files = $("#post_photo_form").get(0).files;
        fd.append("label", "sound");

        for (var i = 0; i < files.length; i++) {
            fd.append("img" + i, files[i]);
        }

        $productId = $("input[name='product_id']").val();

        $.ajax({
            type: "POST",
            url: '<?=BASEURL?>user/post-product-photos-ajax/'+$productId,
            contentType: false,
            processData: false,
            data: fd,
            success: function (resp) {
                resp = JSON.parse(resp);
                if (resp.status == true) {
                    $("#modal-photos tbody").html(resp.data);
                }
                else{
                    alert(resp.msg);
                }
            }        
        })
    })//post-photo-uploader

    $(document).on('click', '.delete-pro-photo', function(event) {
        event.preventDefault();
        $this = $(this);
        $.post('<?=BASEURL."user/delete-pro-photo-ajax"?>', {id: $this.attr('data-id')}, function(resp) {
            resp = JSON.parse(resp);
            if (resp.status == true) {
                $this.parent('td').parent('tr').remove();
            }
            alert(resp.msg);
            
        });
    });

});//onload
</script>


<div class="modal fade" id="modal-photos">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <form action="" enctype="multipart/form-data">
                    <input type="hidden" name="product_id">
                    <div class="form-group">
                        <label>Photos (can select multiple photos by press shift)</label>
                        <input type="file" id="post_photo_form" multiple name="image[]" required="required">
                    </div><!-- /form-group -->
                </form>
                <hr>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <th>Image</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- #modal-photos -->