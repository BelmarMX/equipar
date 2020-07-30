$(document).ready(function (){
    $('.decimal').mask('0000000.00', { reverse: true });

    $('.button-submit-prevent').on('click', function(e){
        e.preventDefault();
        $('.FormSending').show();
        $(this).removeClass('uk-button-primary').addClass('uk-button-default');
        setTimeout(() => {
            $(this).parents('form').submit();
        }, 200);
    });
    $('.sure').on('click', function(e){
        e.preventDefault();
        $url    = $(this).attr('href');
        $act    = $(this).attr('data-title');
        UIkit.modal.confirm('¿Estás seguro de realizar esta acción: ' + $act + '?').then(function () {
            window.location.href = $url;
        }, function () {
        });
    });
    $('#IndexList').DataTable({
        order: [[0, "desc"]],
        scrollY: true,
        responsive: true,
        pageLength: 50,
        lengthMenu: [ [1, 25, 50, 100, -1], [1, 25, 50, 100, "Todos"] ],
        columnDefs: [
            { targets: 'no-sort', orderable: false }
        ],
        language: {
            decimal:        ".",
            emptyTable:     "No se encontraron registros",
            info:           "Mostrando de _START_ a _END_ en _TOTAL_ registro(s)",
            infoEmpty:      "No se muestra ningún registro",
            infoFiltered:   "(filtrados de un total de _MAX_ registro(s))",
            infoPostFix:    "",
            thousands:      ",",
            lengthMenu:     "Mostrar _MENU_ registros",
            loadingRecords: "Cargando...",
            processing:     "Procesando...",
            search:         "Filtrar: ",
            zeroRecords:    "No se encontraron coincidencias",
            paginate: {
                first:      "Primero",
                last:       "Último",
                next:       "Siguiente",
                previous:   "Anterior"
            },
            aria: {
                sortAscending:  ": ordenar de forma ascendente",
                sortDescending: ": ordenar de forma descendente"
            }
        }
    });
    $('#IndexList2').DataTable({
        
        order: [[0, "desc"]],
        scrollY: true,
        responsive: true,
        paging: false,
        columnDefs: [
            { targets: 'no-sort', orderable: false }
        ],
        language: {
            decimal:        ".",
            emptyTable:     "No se encontraron registros",
            info:           "Mostrando de _START_ a _END_ en _TOTAL_ registro(s)",
            infoEmpty:      "No se muestra ningún registro",
            infoFiltered:   "(filtrados de un total de _MAX_ registro(s))",
            infoPostFix:    "",
            thousands:      ",",
            lengthMenu:     "Mostrar _MENU_ registros",
            loadingRecords: "Cargando...",
            processing:     "Procesando...",
            search:         "Filtrar: ",
            zeroRecords:    "No se encontraron coincidencias",
            paginate: {
                first:      "Primero",
                last:       "Último",
                next:       "Siguiente",
                previous:   "Anterior"
            },
            aria: {
                sortAscending:  ": ordenar de forma ascendente",
                sortDescending: ": ordenar de forma descendente"
            }
        }
    });
});
if( $('#RichEdit').length )
{
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}'
    };
    CKEDITOR.replace('RichEdit', options);
}