<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('partials/leftSidebar'); ?>

<section class="content">    
    <div class="container-fluid">	
	<div class="row clearfix">        
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h3>FEES PAYMENT MODULE</h3>
				<form action="<?=site_url('fees/payment_post')?>" method="post">
					<div class="form-group">
						<select class="form-control chosen-select" name="student_id">
						
				
						
					<option selected="true" disabled="true" >-Select Student-</option>		
					<?php foreach ($students as $key => $student): ?>
									<option value="<?=$student->id?>"><?=$student->student_unique_code?></option>
					<?php endforeach ?>			
				</select>
				<div class="margin-top-10"></div>
				<input type="submit" name="" class="btn btn-success full-width" value="Pay Fees" />
			</div>
		</form>
	</div>
		</div>	</div></section>
<?php $this->load->view('admin/partials/footer'); ?>