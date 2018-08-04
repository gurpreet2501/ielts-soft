<? $this->load->view('admin/partials/header') ?>
<style type="text/css">
	.container{
		width:100% !important;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-2">
				<?php $this->load->view('partials/leftSidebar'); ?>
		</div>
		<div class="col-md-10">
			<div class="content-section">
					
						<div class="block-header">
			            <h2><?=!empty($title) ? $title : ''?></h2>
			      </div>
					  <div class="margin-top-100"></div>	
						<?php echo $output;  ?>

						
						</div>
			</div>

			</div> <!-- row -->
</div> <!-- container -->	


<? $this->load->view('admin/partials/footer') ?>

