<?php
function clubFeeTransactions($fee_details){
	$organised_data = [];	
	foreach ($fee_details as $key => $detail) {
	
		$organised_data[$detail['course_details']['course_name']][] = $detail;
	}
	return $organised_data;
}