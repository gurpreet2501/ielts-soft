<?php $this->load->view('admin/partials/header'); ?>
	
<div class="row">
	<div class="col-md-12">
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
	</div>
</div>
<?php $this->load->view('admin/partials/footer'); ?>