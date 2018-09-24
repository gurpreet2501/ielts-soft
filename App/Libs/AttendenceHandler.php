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

		// Models\

}

function processing($data){
	
	return $this->ifDataValid($data);	
	

} 

}