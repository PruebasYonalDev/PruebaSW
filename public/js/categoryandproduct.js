$(document).ready(function() {
    var table = $('#datatable').DataTable();

    // Cargar datos CATEGORIA
    table.on('click', '.editBtnCategory', function(e) {

        e.preventDefault();

        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        // console.log(data);

        $('#name_category').val(data[1]);
        $('#description_category').val(data[2]);

        $('#editFormCategory').attr('action', '/categorias/' + data[0]);
        $('#editModalCategory').modal('show');
    });

    // Eliminar datos CATEGORIA
    table.on('click', '.deleteBtnCategory', function(e) {
        e.preventDefault();

        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();

        $('#deleteFormCategory').attr('action', '/categorias/' + data[0]);
        $('#deleteModalCategory').modal('show');

    });

    // Editar datos PRODUCTO
    table.on('click', '.editBtnProduct', function(e) {
        e.preventDefault();

        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        var url = $($tr).find('img').attr('src');
        console.log('url', url);

        var data = table.row($tr).data();
        console.log(data);

        $('#image').attr('src', url);
        $('#name_product').val(data[2]);
        $('#description_product').val(data[3]);
        $('#FK_id_category').val(data[4]);
        $('#price').val(data[5]);

        $('#editFormProduct').attr('action', '/productos/' + data[0]);
        $('#editModalProduct').modal('show');

    });

    // Eliminar datos PRODUCTO
    table.on('click', '.deleteBtnP', function(e) {
        e.preventDefault();

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