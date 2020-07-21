<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Prueba Software Web SAS</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/weather-icons/climacons.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/meteocons/style.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/chartist.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-content-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/timeline.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/dashboard-ecommerce.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->


    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-content-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-content-menu" data-col="2-columns">

   @include('layout.navbar.navbar')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>

            @include('layout.sidebar.sidebar')
            
            <div class="content-body">
                <!-- Products sell and New Orders -->
                <div class="row match-height">
                    <div class="col-12 col-md-12" id="ecommerceChartView">
                        <div class="card card-shadow">
                            @yield('content')
                        </div>
                    </div>
                </div>
                    
            </div>
        </div>
    </div>
    <!-- END: Content-->


    @include('layout.footer.footer')

    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/ui/headroom.min.js"></script>
    <script src="app-assets/vendors/js/charts/chartist.min.js"></script>
    <script src="app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js"></script>
    <script src="app-assets/vendors/js/charts/raphael-min.js"></script>
    <script src="app-assets/vendors/js/charts/morris.min.js"></script>
    <script src="app-assets/vendors/js/timeline/horizontal-timeline.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
    <!-- END: Page JS-->

    
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="../../../app-assets/js/scripts/tables/datatables-extensions/datatables-sources.js"></script>


    <script>

$(document).ready(function () {
    var table = $('#datatable').DataTable();

    // Cargar datos CATEGORIA
    table.on('click', '.editBtn', function () {
        
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
    table.on('click', '.deleteBtn', function () {
        
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
    table.on('click', '.editBtnP', function () {

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
    table.on('click', '.deleteBtnP', function () {
        
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

</script>

<script>
    $('.carpeta').click(function() {
        $(this).children('ul').slideToggle();
    });

    $('ul').click(function(p) {
        p.stopPropagation();
    });
</script>

</body>
<!-- END: Body-->

</html>