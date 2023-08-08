jQuery(document).ready(function($) { 

	$(document).on('click', '#diamonds_quiz_end', function(){
		let shape = $("input[name='test-1']:checked").val();
  		if(shape) document.cookie = "shape_id=" + shape + "; path=/";
		let min_price = $("input[name='test-2']:checked").attr('min-price');
		let max_price = $("input[name='test-2']:checked").attr('max-price');
  		if(min_price) document.cookie = "min_price=" + min_price + "; path=/";
  		if(max_price) document.cookie = "max_price=" + max_price + "; path=/";
		let importance = $("input[name='test-1']:checked").val();
  		if(importance) document.cookie = "importance_id=" + importance + "; path=/";
  		window.location.href = php_vars.diamonds_quiz_result_url;
	});

});