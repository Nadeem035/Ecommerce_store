<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title"><?=$page_title?></h1>
        <ol class="breadcrumb">
            <li><a href="<?=BASEURL?>user">Dashboard</a></li>
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
                            <th>Title</th>
                            <th>Parent</th>
                            <th>Super Parent</th>
                            <th>Products</th>
                            <th>Filters</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Parent</th>
                            <th>Super Parent</th>
                            <th>Products</th>
                            <th>Filters</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (count($cats) > 0) {
                            $user_cats = explode(',', $user['cats']);
                            foreach ($cats as $q): ?>
                                <?php if (in_array($q['sub_category_id'], $user_cats)): ?>
                                    <tr>
                                        <td><?=$q['title']?></td>
                                        <td><?=$q['catTitle']?></td>
                                        <td><?=$q['superCat']?></td>
                                        <td><a href="<?=BASEURL.'user/products/all/'.$q['sub_category_id']?>" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" data-toggle="tooltip" data-original-title="Products" target="_blank"><i class="icon md-eye" aria-hidden="true"></i></a></td>
                                        <td>
                                            <a href="javascript://" data-id="<?=$q['parent']?>" data-size="<?=$q['size']?>" data-title="<?=$q['catTitle']?>" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row get-sizes" data-toggle="tooltip" data-original-title="Sizes">Sizes</a>
                                            <a href="javascript://" data-id="<?=$q['parent']?>" data-color="<?=$q['color']?>" data-title="<?=$q['catTitle']?>" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row get-colors" data-toggle="tooltip" data-original-title="Sizes">Colors</a>
                                        </td>
                                        <td><?=$q['status']?></td>
                                        <td class="actions"><a href="javascript://"data-id="<?=$q['sub_category_id']?>" data-meta-title="<?=$q['meta_title']?>" data-meta-key="<?=$q['meta_key']?>" data-meta-desc="<?=$q['meta_desc']?>"  class="edit-cat btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-cat" data-toggle="tooltip" data-original-title="Edit Category"><i class="icon md-edit" aria-hidden="true"></i></a></td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach;
                        } //end if
                        else {
                            ?>
                            <tr>
                                <td>
                                    No Category found in the database
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

    $(document).on('click', '.edit-cat', function(event) {
        event.preventDefault();
        $this = $(this);
        $("input[name='id']").val($this.attr('data-id'));
        $("input[name='meta_title']").val($this.attr('data-meta-title'));
        $("input[name='meta_key']").val($this.attr('data-meta-key'));
        $("textarea[name='meta_desc']").val($this.attr('data-meta-desc'));
        $("#edit-modal").modal('show');
    });

    $(document).on('submit', '#edit-form', function(event) {
        event.preventDefault();
        $form = $(this);
        $.post('<?=BASEURL."user/update-sub-cat"?>', {data: $form.serialize()}, function(resp) {
            resp = JSON.parse(resp);
            alert(resp.msg);
            if (resp.status == true) {
                location.reload();
            }
        });
    });

    /**

    SIZE

    */

    $(document).on('click', '.get-sizes', function(event) {
        event.preventDefault();
        $this = $(this);
        $("form.add-size").show(0);
        $("form.edit-size").hide(0);
        $("#sizes-modal .modal-title-main").text($this.attr('data-title')+"'s sizes");
        $("#sizes-modal input[name='category_id']").val($this.attr('data-id'));
        $.post('<?=BASEURL."admin/get-cat-sizes-ajax"?>', {id: $this.attr('data-id')}, function(resp) {
            resp = JSON.parse(resp);
            if (resp.status == true) {
                $("#sizes-modal input[name='size']").each(function(){
                    if (resp.size == $(this).val()) {
                        $(this).prop('checked', true);
                    }
                    else{
                        $(this).prop('checked', false);
                    }
                });
                $("#sizes-modal tbody").html(resp.html);
                $("#sizes-modal").modal('show');
            }
            else{
                alert(resp.msg);
            }
        });
    });

    $(document).on('submit', 'form.size-status', function(event) {
        event.preventDefault();
        $form = $(this);
        $.post('<?=BASEURL."admin/update-size-status"?>', {data: $form.serialize()}, function(resp) {
            resp = JSON.parse(resp);
            alert(resp.msg);
        });
    });
    $(document).on('submit', 'form.add-size', function(event) {
        event.preventDefault();
        $form = $(this);
        $.post('<?=BASEURL."admin/post-size-ajax"?>', {data: $form.serialize()}, function(resp) {
            resp = JSON.parse(resp);
            if (resp.status == true) {
                $("#sizes-modal tbody").html(resp.html);
            }
            else{
                alert(resp.msg);
            }
        });
    });
    $(document).on('click', '.display-add-form', function(event) {
        event.preventDefault();
        $("form.add-size").show(0);
        $("form.edit-size").hide(0);
    });
    $(document).on('click', 'a.edit-size', function(event) {
        event.preventDefault();
        $this = $(this);
        $("form.add-size").hide(0);
        $("form.edit-size input[name='size_id']").val($this.attr('data-id'));
        $("form.edit-size input[name='name']").val($this.attr('data-name'));
        $("form.edit-size input[name='full_name']").val($this.attr('data-full-name'));
        $("form.edit-size").show(0);
    });
    $(document).on('submit', 'form.edit-size', function(event) {
        event.preventDefault();
        $form = $(this);
        $.post('<?=BASEURL."admin/update-size-ajax"?>', {data: $form.serialize()}, function(resp) {
            resp = JSON.parse(resp);
            if (resp.status == true) {
                $("#sizes-modal tbody").html(resp.html);
                $("form.add-size").show(0);
                $("form.edit-size").hide(0);
            }
            else{
                alert(resp.msg);
            }
        });
    });
    $(document).on('click', '.delete-size', function(event) {
        event.preventDefault();
        $this = $(this);
        $.post('<?=BASEURL."admin/delete-size-ajax"?>', {id: $this.attr('data-id')}, function(resp) {
            resp = JSON.parse(resp);
            if (resp.status == true) {
                $this.parent('td').parent('tr').remove();
            }
            else{
                alert(resp.msg);
            }
        });
    });

    /**

    COLOR

    */

    $(document).on('click', '.get-colors', function(event) {
        event.preventDefault();
        $this = $(this);
        $("form.add-color").show(0);
        $("form.edit-color").hide(0);
        $("#colors-modal .modal-title-main").text($this.attr('data-title')+"'s colors");
        $("#colors-modal input[name='category_id']").val($this.attr('data-id'));
        $.post('<?=BASEURL."admin/get-cat-colors-ajax"?>', {id: $this.attr('data-id')}, function(resp) {
            resp = JSON.parse(resp);
            if (resp.status == true) {
                $("#colors-modal input[name='color']").each(function(){
                    if (resp.color == $(this).val()) {
                        $(this).prop('checked', true);
                    }
                    else{
                        $(this).prop('checked', false);
                    }
                });
                $("#colors-modal tbody").html(resp.html);
                $("#colors-modal").modal('show');
            }
            else{
                alert(resp.msg);
            }
        });
    });

    $(document).on('submit', 'form.color-status', function(event) {
        event.preventDefault();
        $form = $(this);
        $.post('<?=BASEURL."admin/update-color-status"?>', {data: $form.serialize()}, function(resp) {
            resp = JSON.parse(resp);
            alert(resp.msg);
        });
    });
    $(document).on('submit', 'form.add-color', function(event) {
        event.preventDefault();
        $form = $(this);
        $.post('<?=BASEURL."admin/post-color-ajax"?>', {data: $form.serialize()}, function(resp) {
            resp = JSON.parse(resp);
            if (resp.status == true) {
                $("#colors-modal tbody").html(resp.html);
            }
            else{
                alert(resp.msg);
            }
        });
    });
    $(document).on('click', '.display-add-form', function(event) {
        event.preventDefault();
        $("form.add-color").show(0);
        $("form.edit-color").hide(0);
    });
    $(document).on('click', 'a.edit-color', function(event) {
        event.preventDefault();
        $this = $(this);
        $("form.add-color").hide(0);
        $("form.edit-color input[name='color_id']").val($this.attr('data-id'));
        $("form.edit-color input[name='name']").val($this.attr('data-name'));
        $("form.edit-color input[name='full_name']").val($this.attr('data-full-name'));
        $("form.edit-color").show(0);
    });
    $(document).on('submit', 'form.edit-color', function(event) {
        event.preventDefault();
        $form = $(this);
        $.post('<?=BASEURL."admin/update-color-ajax"?>', {data: $form.serialize()}, function(resp) {
            resp = JSON.parse(resp);
            if (resp.status == true) {
                $("#colors-modal tbody").html(resp.html);
                $("form.add-color").show(0);
                $("form.edit-color").hide(0);
            }
            else{
                alert(resp.msg);
            }
        });
    });
    $(document).on('click', '.delete-color', function(event) {
        event.preventDefault();
        $this = $(this);
        $.post('<?=BASEURL."admin/delete-color-ajax"?>', {id: $this.attr('data-id')}, function(resp) {
            resp = JSON.parse(resp);
            if (resp.status == true) {
                $this.parent('td').parent('tr').remove();
            }
            else{
                alert(resp.msg);
            }
        });
    });

});
</script>


<div class="modal fade" id="edit-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
            </div>
            <div class="modal-body">
                
                <form id="edit-form">

                    <input type="hidden" name="id">

                    <div class="form-group">
                        <label>Meta Title<span class="required">*</span></label>
                        <input type="text" class="form-control" name="meta_title" placeholder="Meta Title" required="">
                    </div><!-- /form-group -->

                    <div class="form-group">
                        <label>Meta Keywords<span class="required">*</span></label>
                        <input type="text" class="form-control" name="meta_key" placeholder="Meta Keywords" required="">
                    </div><!-- /form-group -->

                    <div class="form-group">
                        <label>Meta Description<span class="required">*</span></label>
                        <textarea name="meta_desc" class="form-control" rows="5" required=""></textarea>
                    </div><!-- /form-group -->

                    <div class="form-group form-material col-lg-12 text-right padding-top-m">
                        <button type="submit" class="btn btn-primary" id="validateButton1">Submit</button>
                    </div><!-- /form-group -->

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- #add-modal -->


<div class="modal fade" id="sizes-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-main">Category Sizes</h4>
            </div>
            <div class="modal-body">
                
                <form class="size-status">
                    <input type="hidden" name="category_id">
                    <div class="form-group">
                        <label>Is size filter available for this ?</label><br>
                        <input type="radio" name="size" value="no" checked> No <br>
                        <input type="radio" name="size" value="yes"> Yes <br>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div><!-- /form-group -->
                </form>

                <hr>
                <form class="add-size">
                    <h4 class="modal-title">Add New Size</h4>
                    <input type="hidden" name="category_id">
                    <div class="form-group">
                        <label>Size *</label>
                        <input type="text" class="form-control" name="name" required>
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="full_name">
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div><!-- /form-group -->
                </form>
                <form class="edit-size" style="display: none;">
                    <a href="javascript://" class="display-add-form" style="color: red;margin: 10px 0;font-size: 20px;"><i class="fa fa-close"></i></a>
                    <h4 class="modal-title">Edit Size</h4>
                    <input type="hidden" name="size_id">
                    <input type="hidden" name="category_id">
                    <div class="form-group">
                        <label>Size *</label>
                        <input type="text" class="form-control" name="name" required>
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="full_name">
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div><!-- /form-group -->
                </form>
                <hr>
                <h4 class="modal-title">Sizes</h4>
                <br>
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <th>Size</th>
                        <th>Size Full Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td>XL</td>
                            <td>Xtra Lagre</td>
                            <td>
                                <a href="javascript://" data-id="" class="edit-size"><i class="icon md-edit" style="color:grey;"></i></a>&nbsp;&nbsp;
                                <a href="javascript://" data-id="" class="delete-size"><i class="fa fa-trash" style="color:red;"></i></a>
                            </td>
                        </tr> -->
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- #add-modal -->

<div class="modal fade" id="colors-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-main">Category Colors</h4>
            </div>
            <div class="modal-body">
                
                <form class="color-status">
                    <input type="hidden" name="category_id">
                    <div class="form-group">
                        <label>Is color filter available for this ?</label><br>
                        <input type="radio" name="color" value="no" checked> No <br>
                        <input type="radio" name="color" value="yes"> Yes <br>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div><!-- /form-group -->
                </form>

                <hr>
                <form class="add-color">
                    <h4 class="modal-title">Add New Color</h4>
                    <input type="hidden" name="category_id">
                    <div class="form-group">
                        <label>Color *</label>
                        <input type="text" class="form-control" name="name" required>
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="full_name">
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div><!-- /form-group -->
                </form>
                <form class="edit-color" style="display: none;">
                    <a href="javascript://" class="display-add-form" style="color: red;margin: 10px 0;font-size: 20px;"><i class="fa fa-close"></i></a>
                    <h4 class="modal-title">Edit Color</h4>
                    <input type="hidden" name="color_id">
                    <input type="hidden" name="category_id">
                    <div class="form-group">
                        <label>Color *</label>
                        <input type="text" class="form-control" name="name" required>
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="full_name">
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div><!-- /form-group -->
                </form>
                <hr>
                <h4 class="modal-title">Colors</h4>
                <br>
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <th>Color</th>
                        <th>Color Full Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td>XL</td>
                            <td>Xtra Lagre</td>
                            <td>
                                <a href="javascript://" data-id="" class="edit-size"><i class="icon md-edit" style="color:grey;"></i></a>&nbsp;&nbsp;
                                <a href="javascript://" data-id="" class="delete-size"><i class="fa fa-trash" style="color:red;"></i></a>
                            </td>
                        </tr> -->
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- #add-modal -->


