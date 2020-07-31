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
    <link rel="apple-touch-icon" href="{{ url('app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/weather-icons/climacons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/fonts/meteocons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/charts/morris.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/charts/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/charts/chartist-plugin-tooltip.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/components.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/core/menu/menu-types/vertical-content-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/fonts/simple-line-icons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/pages/timeline.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/pages/dashboard-ecommerce.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/style.css') }}">
    <!-- END: Custom CSS-->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <!-- jstree -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
    <!-- minified jstree source -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <script src="{{ url('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ url('app-assets/vendors/js/ui/headroom.min.js') }}"></script>
    <script src="{{ url('app-assets/vendors/js/charts/chartist.min.js') }}"></script>
    <script src="{{ url('app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ url('app-assets/vendors/js/charts/raphael-min.js') }}"></script>
    <script src="{{ url('app-assets/vendors/js/charts/morris.min.js') }}"></script>
    <script src="{{ url('app-assets/vendors/js/timeline/horizontal-timeline.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ url('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ url('app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ url('app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script>
    <!-- END: Page JS-->


    <script src="{{ url('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ url('app-assets/js/scripts/tables/datatables-extensions/datatables-sources.js') }}"></script>

    <!-- CATEGORIAS Y PRODUCTOS -->
    <script src="{{ url('js/categoryandproduct.js') }} "></script>

        <!-- EMAIL-PDF -->
    <script src="{{ url('js/emailandpdf.js') }}"></script>

        <!-- COTIZACIONES -->
    <script src="{{ url('js/cotizaciones.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {            

            var folder_jsondata = JSON.parse($('#txt_folderjsondata').val());
            console.log('txt_folderjsondata', txt_folderjsondata);

            jQuery(function($) {

                $('#folder_jstree').jstree({
                    'core': {
                        'data': folder_jsondata,
                        'multiple': false
                    }
                });
                
            });
           

        });
    </script>


</body>
<!-- END: Body-->

</html>