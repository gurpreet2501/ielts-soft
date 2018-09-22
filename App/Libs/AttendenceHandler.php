<?php
namespace App\Libs;
use App\Response\Factory as RF;
use App\Models as M;

class AttendenceHandler{
 
 function __construct(){
 }

function isMachineValid($data){
	if(empty($data['machine_serial']))
	   return RF::error('Machine serial not found or is invalid');
}

function isCardValid(){

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

}

function processing($data){
	
	return $this->ifDataValid($data);	
	

} 

}