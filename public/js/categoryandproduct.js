$(document).ready(function() {
    var table = $('#datatable').DataTable();

    // Cargar datos CATEGORIA
    table.on('click', '.editBtn', function() {

        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        // console.log(data);

        $('#nombre').val(data[1]);
        $('#descripcion').val(data[2]);

        $('#editForm').attr('action', '/categorias/' + data[0]);
        $('#editModal').modal('show');
    });

    // Eliminar datos CATEGORIA
    table.on('click', '.deleteBtn', function() {

        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        // console.log(data);

        $('#nombreD').val(data[1]);

        $('#deleteForm').attr('action', '/categorias/' + data[0]);
        $('#deleteModal').modal('show');

    });

    // Editar datos PRODUCTO
    table.on('click', '.editBtnP', function() {

        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        var url = $($tr).find('img').attr('src');
        console.log('url', url);

        var data = table.row($tr).data();
        console.log(data);

        $('#imagenP').attr('src', url);
        $('#nombre_producto').val(data[2]);
        $('#descripcion_producto').val(data[3]);
        $('#categoria_idP').val(data[4]);
        $('#precioP').val(data[5]);

        $('#editFormP').attr('action', '/productos/' + data[0]);
        $('#editModalP').modal('show');

    });

    // Eliminar datos PRODUCTO
    table.on('click', '.deleteBtnP', function() {

        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        // console.log(data);

        $('#deleteFormP').attr('action', '/productos/' + data[0]);
        $('#deleteModalP').modal('show');

    });
});