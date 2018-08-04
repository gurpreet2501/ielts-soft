<?php $this->load->view('admin/partials/header'); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
				<?php $this->load->view('partials/leftSidebar'); ?>
		</div>
		<div class="col-md-10">
			<a onclick="goBack()"><button class="btn btn-success pull-right">Back</button></a>
			<div class="margin-top-100"></div>
		
				<div class="row">
				
					<div class="col-md-6">
						 <button type="button" class="btn btn-success pay-fees-btn">PAY FEES</button>
						 <button type="button" class="btn btn-warning send-sms-btn">Send SMS</button>
						 <div class="payment-form">
						 	<h3>Enter Transaction Details Below:</h3>
							<form action="<?=site_url('fees/pay')?>" method="post">
								<div class="form-group">
									<input type="text" name="fees_amount" class="form-control" placeholder="Enter Fees Amount" />					
								</div>
								<div class="form-group">
									<input type="hidden" name="student_id" class="form-control" value="<?=$student_id?>"/>					
								</div>
								<div class="form-group">
									<label>Select Course</label>
									<select class='form-control' name="course_id">
										<?php foreach ($courses as $key => $course):?>
												<option value="<?=$course->courseDetails->id?>"><?=$course->courseDetails->course_name?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<input type="submit" name="submit" class="btn btn-danger" value="Pay" />
							</form>
						 </div>
						 <div class="sms-form">
						 	<form action="<?=site_url('sms/send')?>" method="post" id="sms_form_">
						 		<div class="form-group">
							 		<textarea name="message" class="form-control" rows="2"></textarea>
							 		<input type="hidden" name="phone" value="<?=$student_details['phone']?>">
							 		<input type="hidden" name="student_id" value="<?=$student_details['id']?>">
							 		<input type="submit" name="" value="Send Sms" />
						 		</div>
						 	</form>
						 </div>

					</div>
					<div class="col-md-6">
							<div class="outer-block">
										<div class="text-center">
										<h2>Student Details</h2>
										<table class="table table-bordered">
											<tr>
												<td align="right"><strong>#Student Unique Code :</strong></td>
												<td align="left">#<?=$student_details['student_unique_code']?></td>
											</tr>
											<tr>
												<td align="right"><strong>Name :</strong></td>
												<td align="left"><?=$student_details['name']?></td>
											</tr>
											<tr>
												<td align="right"><strong>Email :</strong></td>
												<td align="left"><?=$student_details['email']?></td>
											</tr>
											<tr>
												<td align="right"><strong>Phone :</strong></td>
												<td align="left"><?=$student_details['phone']?></td>
											</tr>
											<tr>
												<td align="right"><strong>Fathers Name :</strong></td>
												<td align="left"><?=$student_details['fathers_name']?></td>
											</tr>
											<tr>
												<td align="right"><strong>Address :</strong></td>
												<td align="left"><?=$student_details['address']?></td>
											</tr>
											<tr>
										   <td align="right"><strong>Highest Qualification :</strong></td>
												<td align="left"><?=$student_details['highest_qualification']?></td>
											</tr>
											<tr>
												<td align="right"><strong>Zip Code :</strong></td>
												<td align="left"><?=$student_details['zip_code']?></td>
											</tr>
										</table>
									</div>
							</div> <!-- outer-block -->
					</div> <!-- col-md-6 -->
				</div> <!-- row -->
		</div>
	</div> <!-- row -->
	<!-- down row --> 
	<hr>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-10">
				<div class="row">
								
					  <?php  foreach ($fees_details as $course_name => $detail): 
										$total_course_fees = isset($detail[0]['course_details']['course_fees']) ? $detail[0]['course_details']['course_fees'] : 0; 
						?>
								<div class="col-md-6">
									<div class="outer-block">
									<div class="text-center"><h3><?=$course_name?>(Fees: Rs.<?=$total_course_fees?>) </h3></div>
									<div class="text-center"><h4>Transaction Details</h4></div>
									<table class="table table-bordered">
										<tr>
											<td>Amount</td>
											<td>Date</td>
										</tr>
										
										<?php $total_submitted_fees = 0; 
										foreach ($detail as $key => $transaction):
											$total_submitted_fees = $total_submitted_fees + $transaction['fees_amount'];
										?>
											<tr>
												<td><span class="color-green">+&nbsp;Rs. <?=$transaction['fees_amount']?></span></td>
												<td><?=date('M d,Y',strtotime($transaction['fee_submission_date']))?></td>
											</tr>
										<?php endforeach ?>				

											<tr>
												<td>Total: <strong>Rs. <?=$total_submitted_fees?></strong></td>
												<?php if($total_submitted_fees < $total_course_fees): ?>
													<td>
														Pending Amount: <span class="color-red"><?=$total_course_fees-$total_submitted_fees?></span>
														
													</td>
												<?php else: ?>		
													<td><span class="label label-success">PAID</span></td>
												<?php endif; ?>		

											</tr>					
									</table>
									
									</div> <!-- outer-block ends -->
							</div> <!-- col-md-6 -->
 	  <?php endforeach; ?>
 	  	</div> <!-- row -->
		</div>
	</div>
</div> <!-- container-fluid -->
<div class="margin-top-100"></div>




<?php $this->load->view('admin/partials/footer'); ?>