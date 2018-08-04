jQuery(function($){
	$('.pay-fees-btn').on('click',function(){
		$(this).slideUp(1000);
		$('.send-sms-btn').show();
		$('.sms-form').slideUp(800);
		$('.payment-form').slideDown(800);
	});
	

	$('.send-sms-btn').on('click',function(){
		$('.pay-fees-btn').show();
		$(this).slideUp(1000);
		$('.sms-form').slideDown(800);
		$('.payment-form').slideUp(800);
	});


});