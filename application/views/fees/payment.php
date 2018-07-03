<?php $this->load->view('admin/partials/header'); ?>
<div class="row">
	<div class="col-md-12">
		<div class="text-center">
			<h2>Students Data</h2>
			<table class="table table-bordered">
				<tr>
					<th>#ID</th>
					<th>Name</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Pending Fees</th>
					<th>Total Fees Paid</th>
					<th>Actions</th>
				</tr>
			<?php foreach ($data as $key => $v): ?>
					<tr>
						<td>#<?=$v->id?></td>
						<td><?=$v->name?></td>
						<td><?=$v->phone?></td>
						<td><?=$v->email?></td>
						<td><span class="color-red">2000</span></td>
						<td><span class="color-green">3000</span></td>
					</tr>
				<?php endforeach ?>	
			</table>
		</div>
	</div>
</div>
<?php $this->load->view('admin/partials/footer'); ?>