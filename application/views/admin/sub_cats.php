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
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#add-modal">
                                <i class="icon md-plus" aria-hidden="true"></i> Add Category
                            </button>
                        </div><!-- /margin-bottom-15 -->
                    </div><!-- /6 -->
                </div><!-- /row -->
                <table class="table table-bordered table-hover dataTable table-striped width-full" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Parent</th>
                            <th>Home Page</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Parent</th>
                            <th>Home Page</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (count($sub_cats) > 0) {
                            foreach ($sub_cats as $q): ?>
                                <tr>
                                    <td><?=$q['title']?></td>
                                    <td><?=$q['catTitle']?></td>
                                    <td><?=$q['show_home']?></td>
                                    <td><?=$q['status']?></td>
                                    <td class="actions">
                                        <a href="javascript://"data-id="<?=$q['sub_category_id']?>"  class="edit-cat btn btn-sm btn-icon btn-pure btn-default on-default edit-row" data-toggle="tooltip" data-original-title="Edit"><i class="icon md-edit" aria-hidden="true"></i></a><br>
                                        <select name="status" data-id="<?=$q['sub_category_id']?>" class="form-control change-status">
                                            <option value="">Change Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select><br>
                                        <select name="show_home" data-id="<?=$q['sub_category_id']?>" class="form-control change-show-home">
                                            <option value="">Show On Home Page</option>
                                            <option value="yes">YES</option>
                                            <option value="no">NO</option>
                                        </select>
                                    </td>
                                </tr>
                                <?php endforeach;
                        } //end if
                        else {
                            ?>
                            <tr>
                                <td>
                                    No Sub Category found in the database
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

    $(document).on('change', 'select.change-status', function(event) {
        event.preventDefault();
        $this = $(this);
        $id = $this.attr('data-id');
        $status = $this.val();
        $.post('<?=BASEURL."admin/change-sub-cat-status"?>', {status: $status, id: $id}, function(resp) {
            resp = JSON.parse(resp);
            alert(resp.msg);
            location.reload();
        });
    });
    $(document).on('change', 'select.change-show-home', function(event) {
        event.preventDefault();
        $this = $(this);
        $id = $this.attr('data-id');
        $show_home = $this.val();
        $.post('<?=BASEURL."admin/change-sub-cat-show-home"?>', {show_home: $show_home, id: $id}, function(resp) {
            resp = JSON.parse(resp);
            alert(resp.msg);
            location.reload();
        });
    });

    $(document).on('submit', '#add-form', function(event) {
        event.preventDefault();
        $form = $(this);
        $.post('<?=BASEURL."admin/post-sub-cat"?>', {data: $form.serialize()}, function(resp) {
            resp = JSON.parse(resp);
            alert(resp.msg);
            if (resp.status == true) {
                location.reload();
            }
        });
    });

    $(document).on('click', '.edit-cat', function(event) {
        event.preventDefault();
        $this = $(this);
        $.post('<?=BASEURL."admin/get-sub-cat-ajax"?>', {id: $this.attr('data-id')}, function(resp) {
            resp = JSON.parse(resp);
            if (resp.status == true) {
                $("input[name='id']").val(resp.cat.sub_category_id);
                $("input[name='super_category_id']").val(resp.cat.super_category_id);
                $("input[name='category_id']").val(resp.cat.category_id);
                $("input[name='title']").val(resp.cat.title);
                $("input[name='slug']").val(resp.cat.slug);
                $("textarea[name='detail']").code(resp.cat.detail);
                $("textarea[name='suggested_items']").code(resp.cat.suggested_items);
                $("input[name='meta_title']").val(resp.cat.meta_title);
                $("input[name='meta_key']").val(resp.cat.meta_key);
                $("textarea[name='meta_desc']").val(resp.cat.meta_desc);
                $("#edit-modal select[name='status'] option").each(function(){
                    if (resp.cat.status == $(this).val()) {
                        $(this).attr('selected', 'selected');
                    }
                });
                if (resp.cat.home_ad.length > 4) {
                    $("#input-file-2").attr('data-default-file', '<?=UPLOADS?>'+resp.cat.home_ad);
                    $(".image-2").val(resp.cat.home_ad);
                    $(".show-edit-image").prop('src', '<?=UPLOADS?>'+resp.cat.home_ad);
                }
                $("#edit-modal").modal('show');
            }
            else{
                alert(resp.msg);
            }
        });
    });

    $(document).on('submit', '#edit-form', function(event) {
        event.preventDefault();
        $form = $(this);
        $.post('<?=BASEURL."admin/update-sub-cat"?>', {data: $form.serialize()}, function(resp) {
            resp = JSON.parse(resp);
            alert(resp.msg);
            if (resp.status == true) {
                location.reload();
            }
        });
    });


    $("#input-file").on('change',function(){
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
                    $("input[name='home_ad']").val(resp.data);
                }
                else
                {
                    alert(resp.msg)
                }
            }
        });
    });//#input-file
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


<div class="modal fade" id="add-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Category</h4>
            </div>
            <div class="modal-body">
                
                <form id="add-form">

                    <input type="hidden" name="parent" value="<?=$cat['category_id']?>">
                    <input type="hidden" name="super_category_id" value="<?=$cat['parent']?>">

                    <div class="form-group">
                        <label>Title<span class="required">*</span></label>
                        <input type="text" class="form-control" name="title" placeholder="Category Title" required="">
                    </div><!-- /form-group -->
                
                    <div class="form-group">
                        <label>URL Slug<span class="required">*</span></label>
                        <input type="text" class="form-control" name="slug" placeholder="Category URL Slug" required="">
                    </div><!-- /form-group -->                    

                    <div class="col-lg-12 form-horizontal">
                        <div class="example-wrap">
                            <h4 class="example-title">Home Page AD</h4>
                            <div class="example">
                                <input type="file" id="input-file" data-plugin="dropify" required data-default-file=""/>
                                <input type="text" name="home_ad" required hidden>
                            </div><!-- /example -->
                        </div><!-- /example-wrap -->
                    </div><!-- /12/form-horizontal -->

                    <div class="form-group">
                        <label>Detail</label>
                        <textarea class="form-control" placeholder="Detail" name="detail" data-plugin="summernote"></textarea>
                    </div><!-- /form-group -->

                    <div class="form-group">
                        <label>Suggested Items</label>
                        <textarea class="form-control" placeholder="Suggested Items" name="suggested_items" data-plugin="summernote"></textarea>
                    </div><!-- /form-group -->

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
                
                    <div class="form-group">
                        <label>Status<span class="required">*</span></label>
                        <select name="status" class="form-control" required="required">
                            <option value="">Select Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">inactive</option>
                        </select>
                    </div><!-- /form-group -->

                    <div class="form-group form-material col-lg-12 text-right padding-top-m">
                        <button type="submit" class="btn btn-primary" id="validateButton1">Add</button>
                    </div><!-- /form-group -->

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- #add-modal -->


<div class="modal fade" id="edit-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
            </div>
            <div class="modal-body">
                
                <form id="edit-form">

                    <input type="hidden" name="id">
                    <input type="hidden" name="parent" value="<?=$cat['category_id']?>">
                    <input type="hidden" name="super_category_id" value="<?=$cat['super_category_id']?>">
                    
                    <div class="form-group">
                        <label>Title<span class="required">*</span></label>
                        <input type="text" class="form-control" name="title" placeholder="Category Title" required="">
                    </div><!-- /form-group -->
                
                    <div class="form-group">
                        <label>URL Slug<span class="required">*</span></label>
                        <input type="text" class="form-control" name="slug" placeholder="Category URL Slug" required="">
                    </div><!-- /form-group -->

                    <div class="col-lg-12 form-horizontal">
                        <div class="example-wrap">
                            <h4 class="example-title">Home Page AD</h4>
                            <div class="example">
                                <img src="" class="show-edit-image" style="width: 100%;margin-bottom: 5px;">
                                <input type="file" id="input-file-2" data-plugin="dropify" data-default-file=""/>
                                <input type="text" name="home_ad" class="image-2" hidden>
                            </div><!-- /example -->
                        </div><!-- /example-wrap -->
                    </div><!-- /12/form-horizontal -->

                    <div class="form-group">
                        <label>Detail</label>
                        <textarea class="form-control" placeholder="Detail" name="detail" data-plugin="summernote"></textarea>
                    </div><!-- /form-group -->

                    <div class="form-group">
                        <label>Suggested Items</label>
                        <textarea class="form-control" placeholder="Suggested Items" name="suggested_items" data-plugin="summernote"></textarea>
                    </div><!-- /form-group -->

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
                
                    <div class="form-group">
                        <label>Status<span class="required">*</span></label>
                        <select name="status" class="form-control" required="required">
                            <option value="">Select Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">inactive</option>
                        </select>
                    </div><!-- /form-group -->

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


