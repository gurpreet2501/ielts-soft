<?php $this->load->view('admin/partials/header'); ?><?php $this->load->view('partials/leftSidebar'); ?><section class="content">        <div class="container-fluid">			<div class="row clearfix">                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">					<h3 class="text-center">Bulk Sms</h3>
		  <form action="<?=site_url('student/bulk_sms_post')?>" method="post">
			<div class="form-group">
				<label>Select Course</label>
				<select class="form-control" name="course_id">
					<?php foreach ($courses as $key => $course):?>
							<option value="<?=$course->id?>"><?=$course->course_name?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<textarea name="sms_text" class="form-control" rows='5' id="sms_text_area">				</textarea>			</div>
				<br>
				<input type="submit" value="Send Sms" class='btn btn-danger full-width' />
		</form>
				
			</div>		</div>	</div></section>
<?php $this->load->view('admin/partials/footer'); ?>