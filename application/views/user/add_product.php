<div class="page animsition">
    <div class="page-header">
      	<h1 class="page-title">
      		<?=$page_title?>
		</h1>
      	<ol class="breadcrumb">
	        <li><a href="<?=BASEURL?>user">Admin</a></li>
            <li><?=$page_title?></li>
      	</ol>
      	<div class="page-header-actions">
	        <a class="btn btn-sm btn-primary btn-round" href="<?=BASEURL?>" target="_blank">
          		<i class="icon md-link" aria-hidden="true"></i>
	          	<span class="hidden-xs">Website</span>
	        </a>
      	</div><!-- /page-header-actions -->
    </div><!-- /page-header -->
    <?php if (isset($_GET['msg'])):?>
		<div class="bg-success well">
			<p><?=$_GET['msg']?></p>
		</div>
	<?php endif;?>
    <div class="page-content container-fluid">
      	<div class="panel">
	        <div class="panel-heading">
	          	<h3 class="panel-title">Provide Details</h3>
	        </div><!-- /panel-heading -->
	        <div class="panel-body">
	          <form id="exampleFullForm" autocomplete="off" enctype="multipart/form-data" method="post" action="
	          	<?php
		  		if($mode != edit)echo BASEURL."user/post-product";
			  	else echo BASEURL."user/update-product";
		  		?>">
		  		<?php
				$required_string = "required";
				if(isset($mode) && $mode=="edit") {?>
					<input type="hidden" name="mode" value="edit" />
					<input type="hidden" name="aid" value="<?=$_GET['id']?>" />
					<input type="hidden" name="security" value="1ee344ecee344e778694777eb3323a" />
				<?php $required_string = '';
				}?>

	            <div class="row row-lg">

					<input type="hidden" name="sub_category_id" value="<?=$cat['sub_category_id']?>">
					
					<div class="col-lg-12 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Title
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="title" placeholder="Product Title" required="" value="<?=$q['title']?>">
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-12 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">URL Slug
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="slug" placeholder="Product URL Slug" required="" value="<?=$q['slug']?>">
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-12 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Short Description
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<textarea name="short_desc" class="form-control" rows="5" required=""><?=$q['short_desc']?></textarea>
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-4 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Price
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="price" placeholder="Price" value="<?=$q['price']?>" required>
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-4 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Discount</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="discount" placeholder="Discount" value="<?=$q['discount']?>">
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-4 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Discount Percentage</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="discount_percentage" placeholder="Discount Percentage" value="<?=$q['discount_percentage']?>">
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<?php if ($sizes): ?>
						<span style="display: block;padding: 10px 30px;font-size: 30px;">Sizes</span>
						<div style="background: #f5f5f5;padding: 20px 50px 0 50px;margin-bottom: 20px;">
							<div class="row row-lg">
								<div class="col-lg-3 form-horizontal">
									<div class="form-group form-material">
										<input type="checkbox" id="check-all-sizes">
										<label class="control-label">All</label>
									</div><!-- /form-group -->
								</div><!-- /form-horizontal -->
								<?php
								if ($mode == 'edit') {
									$proSizes = explode(',', $q['sizes']);
								}
								else{
									$proSizes = false;
								}
								?>
								<?php foreach ($sizes as $key => $size): ?>
									<div class="col-lg-3 form-horizontal">
										<div class="form-group form-material">
											<?php if (in_array($size['size_id'], $proSizes)): ?>
												<input type="checkbox" name="size[]" value="<?=$size['size_id']?>" checked>
											<?php else: ?>
												<input type="checkbox" name="size[]" value="<?=$size['size_id']?>">
											<?php endif ?>
											<label class="control-label"><?=$size['name']?></label>
										</div><!-- /form-group -->
									</div><!-- /form-horizontal -->
								<?php endforeach ?>
							</div><!-- /row -->
						</div><!-- /panel-body -->
					<?php endif ?>

					<?php if ($colors): ?>
						<span style="display: block;padding: 10px 30px;font-size: 30px;">Colors</span>
						<div style="background: #f5f5f5;padding: 20px 50px 0 50px;margin-bottom: 20px;">
							<div class="row row-lg">
								<div class="col-lg-3 form-horizontal">
									<div class="form-group form-material">
										<input type="checkbox" id="check-all-colors">
										<label class="control-label">All</label>
									</div><!-- /form-group -->
								</div><!-- /form-horizontal -->
								<?php
								if ($mode == 'edit') {
									$proColors = explode(',', $q['colors']);
								}
								else{
									$proColors = false;
								}
								?>					
								<?php foreach ($colors as $key => $color): ?>
									<div class="col-lg-3 form-horizontal">
										<div class="form-group form-material">
											<?php if (in_array($color['color_id'], $proColors)): ?>
												<input type="checkbox" name="color[]" value="<?=$color['color_id']?>" checked>
											<?php else: ?>
												<input type="checkbox" name="color[]" value="<?=$color['color_id']?>">
											<?php endif ?>
											<label class="control-label"><?=$color['name']?></label>
										</div><!-- /form-group -->
									</div><!-- /form-horizontal -->
								<?php endforeach ?>
							</div><!-- /row -->
						</div><!-- /panel-body -->
					<?php endif ?>

					<div class="col-lg-12 form-horizontal">
		            	<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Detail</label>
							<div class=" col-lg-12 col-sm-9">
								<textarea class="form-control" placeholder="Detail" name="detail" data-plugin="summernote"><?=$q['detail']?></textarea>
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /12/form-horizontal -->

	              	<div class="col-lg-12 form-horizontal">
		                <div class="example-wrap">
							<h4 class="example-title">Image</h4>
							<div class="example">
								<input type="file" id="input-file-now" data-plugin="dropify" required data-default-file="<?=UPLOADS.$q['image']?>"/>
								<input type="text" name="image" required value="<?=$q['image']?>" hidden>
							</div><!-- /example -->
						</div><!-- /example-wrap -->
	              	</div><!-- /12/form-horizontal -->
					
					<div class="col-lg-6 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Status
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<select name="status" class="form-control" required="required">
									<option value="">Select Status</option>
									<option value="active" <?=($q['status'] == 'active') ? 'selected="selected"' :"";?> >Active</option>
									<option value="inactive" <?=($q['status'] == 'inactive') ? 'selected="selected"' :"";?>>inactive</option>
								</select>
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-6 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">New Product
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<select name="new" class="form-control" required="required">
									<option value="">Select</option>
									<option value="yes" <?=($q['new'] == 'yes') ? 'selected="selected"' :"";?> >Yes</option>
									<option value="no" <?=($q['new'] == 'no') ? 'selected="selected"' :"";?>>No</option>
								</select>
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-6 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Featured Product
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<select name="featured" class="form-control" required="required">
									<option value="">Select</option>
									<option value="yes" <?=($q['featured'] == 'yes') ? 'selected="selected"' :"";?> >Yes</option>
									<option value="no" <?=($q['featured'] == 'no') ? 'selected="selected"' :"";?>>No</option>
								</select>
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-12 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Meta Title
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="meta_title" placeholder="Meta Title" required="" value="<?=$q['meta_title']?>">
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-12 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Meta Keywords
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="meta_key" placeholder="Meta Keywords" required="" value="<?=$q['meta_key']?>">
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-12 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Meta Description
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<textarea name="meta_desc" class="form-control" rows="5" required=""><?=$q['meta_desc']?></textarea>
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

	              	<div class="form-group form-material col-lg-12 text-right padding-top-m">
	                	<button type="submit" class="btn btn-primary" id="validateButton1">Submit</button>
	              	</div><!-- /form-group -->
	            </div><!-- /row/row-lg -->
	          </form>
	        </div><!-- /panel-body -->
      </div><!-- /panel -->
    </div>
</div><!-- /page/animsition -->

<script>
$(function(){
	$("#input-file-now").on('change',function(){
		$("#validateButton1").text('Wait File Is Uploading');
		var data = new FormData();
    	data.append('img', $(this).prop('files')[0]);
	    $.ajax({
	        type: 'POST',
	        processData: false,
	        contentType: false,
	        data: data,
	        url: '<?=BASEURL?>user/post-photo-ajax',
	        dataType : 'json',
	        success: function(resp){
	        	// resp = $.parseJSON(resp);
	        	console.log(resp.data);
	       		if (resp.status == true)
	       		{
	       			$("#validateButton1").removeAttr('disabled');
	       			$("#validateButton1").text('Submit');
	       			$("input[name='image']").val(resp.data);
	       		}
	       		else
	       		{
	       			alert(resp.msg)
	       			$("#validateButton1").text('Upload An Image First');
	       		}
	        }
	    });
	});//#input-file-now


	/**
    *
    *   PRODUCT DIFF
    *
    */
    $(document).on('keyup', 'input[name="discount_percentage"],input[name="price"]', function(event) {
        event.preventDefault();
        $price = parseInt($("input[name='price']").val());
        $diff = parseInt($("input[name='discount']").val());
        $sale = parseFloat($("input[name='discount_percentage']").val());
        if ($sale > 0) {
            $unit = $price/100;
            $Diff = $unit*$sale;
            $("input[name='discount']").val(parseInt($Diff));
        }
        else{
            $("input[name='discount']").val(0);
        }
    });
    $(document).on('keyup', 'input[name="discount"]', function(event) {
        event.preventDefault();
        $price = parseInt($("input[name='price']").val());
        $diff = parseInt($("input[name='discount']").val());
        $sale = parseFloat($("input[name='discount_percentage']").val());
        if ($diff == 0 || isNaN($diff)) {
            $("input[name='discount']").val('');
            $("input[name='discount_percentage']").val('');
        }
        else{
            $unit = $price/100;
            $Diff = $diff/$unit;
            $("input[name='discount_percentage']").val(parseInt($Diff));
        }
    });


    $(document).on('change', '#check-all-sizes', function(event) {
        event.preventDefault();
        if ($(this).prop('checked') == true) {
            $("input[name='size[]']").prop('checked',true);
        }
        else{
            $("input[name='size[]']").prop('checked',false);
        }
    });

    $(document).on('change', '#check-all-colors', function(event) {
        event.preventDefault();
        if ($(this).prop('checked') == true) {
            $("input[name='color[]']").prop('checked',true);
        }
        else{
            $("input[name='color[]']").prop('checked',false);
        }
    });


})
</script>
