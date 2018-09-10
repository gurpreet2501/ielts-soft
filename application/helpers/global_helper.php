<?php

function clubFeeTransactions($fee_details){
	$organised_data = [];	
	foreach ($fee_details as $key => $detail) {
	
		$organised_data[$detail['course_details']['course_name']][] = $detail;
	}
	return $organised_data;
}

function findTotalCourseFeeSubmitted($student_id,$course_id){
	return Models\FeesDetails::where('students_registration_id',$student_id)
										  ->where('course_id',$course_id)->sum('fees_amount');
										
}

function isFeesPending($data){ 
	$student_id = $data['student_id'];
	$paid_flag = true;
	$courses = Models\StudentsRegistrationCourses::where('students_registration_id',$data['student_id'])->get();
	foreach ($courses as $key => $course) {
		$course_details = $course->courseDetails;
		$total_submitted_fees = findTotalCourseFeeSubmitted($student_id,$course_details->id);
		if($course_details->course_fees>$total_submitted_fees)
			$paid_flag = false;

	}
	return $paid_flag;
}