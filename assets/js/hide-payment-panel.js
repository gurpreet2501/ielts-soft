jQuery(function($){
	$('.payment-form').hide();
	$('.pay-fees-btn').on('click',function(){
		$(this).slideUp(1000);
		$('.payment-form').slideDown(800);
	});

});