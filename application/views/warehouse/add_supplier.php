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
		  		if($mode != edit)echo BASEURL."warehouse/post-supplier";
			  	else echo BASEURL."warehouse/update-supplier";
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
					
					<div class="col-lg-12 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">First Name
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="fname" placeholder="First Name" required="" value="<?=$q['fname']?>">
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-12 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Last Name
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="lname" placeholder="Last Name" required="" value="<?=$q['lname']?>">
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-12 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Company
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="company" placeholder="Company" required="" value="<?=$q['company']?>">
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-12 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Phone
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="phone" placeholder="Phone" required="" value="<?=$q['phone']?>">
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-12 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Email
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="email" placeholder="Email" required="" value="<?=$q['email']?>">
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-12 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Address</label>
							<div class=" col-lg-12 col-sm-9">
								<textarea name="address" class="form-control" rows="3"><?=$q['address']?></textarea>
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					
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

	              	<div class="form-group form-material col-lg-12 text-right padding-top-m">
	                	<button type="submit" class="btn btn-primary" id="validateButton1">Submit</button>
	              	</div><!-- /form-group -->
	            </div><!-- /row/row-lg -->
	          </form>
	        </div><!-- /panel-body -->
      </div><!-- /panel -->
    </div>
</div><!-- /page/animsition -->



