<div class="page animsition">
    <div class="page-header">
      	<h1 class="page-title">
      		<?=$page_title?>
		</h1>
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
    <?php if (isset($_GET['msg'])):?>
		<div class="bg-success well">
			<p><?=$_GET['msg']?></p>
		</div>
	<?php endif;?>
    <div class="page-content container-fluid">
      	<div class="panel">
	        <div class="panel-heading">
	          	<h3 class="panel-title"><?=$page_title?></h3>
	        </div><!-- /panel-heading -->
	        <div class="panel-body">
	          <form id="exampleFullForm" autocomplete="off" enctype="multipart/form-data" method="post" action="
	          	<?php
		  		if($mode != edit)echo BASEURL."warehouse/post-supply";
			  	else echo BASEURL."warehouse/update-supply";
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
					
					<div class="col-lg-6 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Supplier
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<select name="supplier_id" class="form-control" required data-plugin="select2">
									<option value="">Select Supplier</option>
									<?php foreach ($suppliers as $key => $supplier): ?>
										<option value="<?=$supplier['supplier_id']?>"><?=$supplier['fname'].' '.$supplier['lname'].' ('.$supplier['company'].')'?></option>
									<?php endforeach ?>
								</select>
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-6 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Product
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<select name="product_id" class="form-control" required data-plugin="select2">
									<option value="">Select Product</option>
									<?php foreach ($products as $key => $product): ?>
										<option value="<?=$product['product_id']?>"><?=$product['title']?></option>
									<?php endforeach ?>
								</select>
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-4 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Quantity
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="qty" placeholder="Quantity" required="" value="<?=$q['qty']?>">
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-4 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Unit Price
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="single_price" placeholder="Unit Price" required="" value="<?=$q['single_price']?>">
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-4 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Total
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="total_price" placeholder="Total" required="" value="<?=$q['total_price']?>">
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



