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

	$(document).on('click', '#form_step_1_button_next', function(){
		window.location.href = php_vars.form_step_2_url;
	});

	$(document).on('click', '#form_step_2_button_prev', function(){
		window.location.href = php_vars.form_step_1_url;
	});

	$(document).on('click', '#form_diamond_submit', function(){
    
		let design = $("input[name='custom_design']:checked").val();
		if (design) $('#form_diamond_design').val(design);

		let phone_code = $(".iti__selected-dial-code").first().text();
		if (phone_code) $('#form_phone_code').val(phone_code);
    
		let shape = [];
		$("input[name='diamond_shape']:checked").each(function() {
			shape.push($(this).val());
		});
		if (shape) $('#form_diamond_shape').val(shape.join(', '));
		let carat = [];
		$("input[name='carat_weight']:checked").each(function() {
			carat.push($(this).val());
		});
		if (carat) $('#form_diamond_weight').val(carat.join(', '));
	});

});