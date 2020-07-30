$('#category').on('change', function (e) {
    $('#subcategory').html('<option value="">Seleccionar categoría</option>');
    $.ajax({
        url: "/dashboard/product/categories/"+$('#category').val()+"/json",
    }).done(function (d) {
        a = '';
        var r = JSON.parse(d);
        $.each(r, function(i, val){
            $('#subcategory').append('<option value="' + val.id + '">' + val.title + '</option>');
        })
        console.log(a);
        /*console.log(d);
        $('#subcategory').addClass("done");*/
    });
});