<?php $this->load->view('admin/partials/header'); ?>
<!-- <div class="row">
	<div class="col-md-12">
		  <div class='filters'>
		    <form class="form-inline" method="get">
		         
		        <div class="form-group">
		        	<div><label>Start Date</label></div>
		          <input type="text" name="start_date" class="form-control _datepicker" />
		        </div> 
		        <input type="submit" name="filter" class="btn btn-success" value="FILTER">
		      </form>
		  </div>
	</div>
</div> -->
<!-- filters	 -->
<div class="row">
	<div class="col-md-12">
		<h3 class="text-center">Todays Attendence Details</h3>
			<?php if(count($attendence_data)): ?>
			<table class='table table-stripped'>
				<tr>
					<td>Unique Id</td>
					<td>Name</td>
					<td>Email</td>
					<td>Phone</td>
					<td>Attendence Date-Time</td>
				</tr>
				<?php foreach ($attendence_data as $key => $row):?>
							<tr>
								<td><?=$row->student->student_unique_code?></td>
								<td><?=$row->student->name?></td>
								<td><?=$row->student->email?></td>
								<td><?=$row->student->phone?></td>
								<td><?=date('d M,Y H:i:s',strtotime($row->attendence_time))?></td>
							</tr>
				<?php endforeach;?>
			</table>
			<?php else: ?>
					<h5 class="text-center">No Records Found!</h3>
			<?php endif; ?>

	</div>
</div>
<?php $this->load->view('admin/partials/footer'); ?>