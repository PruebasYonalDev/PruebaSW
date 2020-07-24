$(document).ready(function() {
    var table = $('#datatable').DataTable();

    // Cargar datos CATEGORIA
    table.on('click', '.descargar', function(e) {

        e.preventDefault();

        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        // console.log(data);

        var idCliente = data[1];

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: "/obtenerid",
            dataType: 'json',
            data: {id: idCliente}
        }).done(function(res) {
            console.log(res);
        });
    });

});