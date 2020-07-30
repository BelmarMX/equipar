$("#txtcorreo").on('change', function(){
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		data:
		{
			email: $(this).val()
		}
	,	url:		url_find
	,	type:		'POST'
	,	success:	function ( response )
		{
			data = JSON.parse( response );
			if( data.id > 0 )
			{
				$("#exist").val(data.id);
				$("#txtnombre").val(data.nombre);
				$("#txttel").val(data.phone);
				$("#txtcompany").val(data.company);
				$("#txtciudad").val(data.city);
				$("#txtestado").val(data.state);
				$("#txtcomentario").focus();
			}
			else{
				$("#exist").val(0);
				$("#txtnombre").val('');
				$("#txttel").val('');
				$("#txtcompany").val('');
				$("#txtciudad").val('');
				$("#txtestado").val('');
				$("#txtnombre").focus();
			}
		}
	});
});
$(".addQuote").on('click', function(){
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		data:
		{
			id:	$(this).attr('data-prod')
		}
	,	url:		url_add
	,	type:		'POST'
	,	success:	function ( response )
		{
			//location.reload();
			location.href = '/cotizar';
		}
	});
});
$(".removeQuote").on('click', function(){
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		data:
		{
			index: $(this).attr('data-index')
		}
	,	url:		url_remove
	,	type:		'POST'
	,	success:	function ( response )
		{
			location.reload();
		}
	});
});
$(".qty").on('change', function(){
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		data:
		{
				index: $(this).attr('data-index')
			,	value: $(this).val()
		}
	,	url:		url_update
	,	type:		'POST'
	,	success:	function ( response )
		{
			/* silence is golden */
		}
	});
});

$('.button-submit-prevent').on('click', function(e){
	$('.FormSending').show();
	setTimeout(function(){ $('.FormSending').fadeOut(); }, 4500);
});