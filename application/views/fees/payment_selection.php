<?php $this->load->view('admin/partials/header'); ?>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<h3>FEES PAYMENT MODULE</h3>
		<form action="<?=site_url('fees/payment_post')?>" method="post">
			<div class="form-group">
				<select class="form-control" name="student_id">
					<option selected="true" disabled="true" >-Select Student-</option>		
					<?php foreach ($students as $key => $student): ?>
									<option value="<?=$student->id?>"><?=$student->student_unique_code?></option>
					<?php endforeach ?>			
				</select>
				<br>
				<input type="submit" name="" class="btn btn-success full-width" value="Pay Fees" />
			</div>
		</form>
	</div>
	<div class="col-md-4"></div>	
</div>
<?php $this->load->view('admin/partials/footer'); ?>