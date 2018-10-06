<?php
namespace App\Libs;
use App\Response\Factory as RF;
use Models as M;

class AttendenceHandler{
 
 function __construct(){
 }
 
function isMachineValid($data){

	if(empty($data['machine_serial']))
	   return RF::error('Machine serial is required');
	 
	 $resp =  M\Machines::where('machine_serial',trim($data['machine_serial']))
	 						 ->where('disabled',0)
	 						 ->count();
	 					
	if(!$resp)
	 		return RF::error('Either machine is disabled or serial incorrect');	

	return RF::success();
	 							 

}

function isCardValid($data){

	if(empty($data['card_serial']))
	   return RF::error('Card Serial is required');
	 
	 $resp =  M\Cards::where('card_serial',trim($data['card_serial']))
	 						 ->where('blocked',0)
	 						 ->count();
	 					 
	 	if(!$resp)
	  		return RF::error('Either card is missing or blocked');	

	 	return RF::success();
	 							 
}

function checkIfMasterMachine(){

}

function checkIfMasterCard(){

}
 
function ifDataValid($data){

		$resp = $this->isMachineValid($data);
		
		if($resp->failed())
			return $resp->errorsArray();
		
		$resp = $this->isCardValid($data);
		
		if($resp->failed())
			return $resp->errorsArray();

		$assigned = $this->getAssignedCardDetails($data['card_serial']);

} 

function getAssignedCardDetails($card_serial){
	$card = M\Cards::with('student.studentCourses')->where('card_serial',trim($card_serial))->first();
	
	if(!count($card->student->studentCourses))
			return RF::error('Student is not assigned to any course');	

	$course_id = $this->findCurrentCourseAccToCurrentTime($card->student->studentCourses);

	if(empty($course_id))
			return RF::error('Unable to mark attendence. Server Error occured');	

	return $this->markAttendence($card->student_id,$course_id,$card->id, $card->machine_id);


}

function markAttendence($student_id,$course_id,$card_id,$machine_id){

	$count = M\StudentsAttendence::where('course_id', $course_id)
										  ->where('card_id', $card_id)
										  ->where('added_by', user_id())
										  ->where('machine_id', $machine_id)
										  ->where('student_id', $student_id)
										  ->where('created_at','>=', date('Y-m-d 00:00:00'))
										  ->where('created_at','<=', date('Y-m-d 23:59:59'))
										  ->count();
									
	if($count)
		return RF::error('Attendence already exists');
 
	$resp = M\StudentsAttendence::create([
		'course_id' => $course_id,
		'student_id' => $student_id,
		'card_id' => $card_id, 
		'added_by' => user_id(),
		'machine_id' => $machine_id,
		'attendence_time' => date('Y-m-d H:i:s')
	]);


	return $resp;


}

function findCurrentCourseAccToCurrentTime($courses){
	foreach ($courses as $key => $course) {
		
		$current_time = date('H:i:s');

		if($course->start_time <  $current_time &&  $course->end_time >  $current_time){
			return $course->id;
		}
			
	}

}

function processing($data){
	
	return $this->ifDataValid($data);	
	

} 

}