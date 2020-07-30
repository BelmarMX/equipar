$('.elBoton').on('click', function(e){
	e.preventDefault();

	var quantity	= parseFloat($('#quantity').val())
	,	operation1	= $('#operator1').val()
	,	operation2	= $('#operator2').val()

	$.each( $('.eachProduct') , function(){
		var precio	= parseFloat($(this).find('.prPrice').children('input').val());
		precio		= precio > 0 ? precio : 0.00;

		if(operation2 == '+')
		{
			if( operation1 == '%')
			{
				nuevo = precio + (quantity * precio) / 100;
			}
			else if( operation1 == '$')
			{
				nuevo = precio + quantity
			}
		}
		else if(operation2 == '-')
		{
			if( operation1 == '%')
			{
				nuevo = precio - (quantity * precio) / 100;
			}
			else if( operation1 == '$')
			{
				nuevo = precio - quantity
			}
		}

		if( nuevo <= 0 )
			nuevo = 0.00;

		$(this).children('.prPromo').find('input').val( nuevo.toFixed(2) );
	});
});