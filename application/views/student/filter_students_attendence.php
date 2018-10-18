<?php $this->load->view('admin/partials/header'); ?>
<?php 
foreach ($attendence_data as $key => $row) {
	echo "<pre>";
	print_r($row->student->phone);
	print_r($row->machine);
	exit;
}
?>
<?php $this->load->view('admin/partials/footer'); ?>