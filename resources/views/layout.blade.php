<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Noa – Bootstrap 5 Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title>Quản Trị NewPhone</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('./assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('./assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('./assets/css/skin-modes.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('./assets/css/icons.css') }}" rel="stylesheet" />

    <link href="https://cdn.datatables.net/v/dt/dt-1.13.5/datatables.min.css" rel="stylesheet">
    <link href="{{asset('assets/datatable/datatable.css')}}" rel="stylesheet" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
</head>

<body class="ltr app sidebar-mini">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="/assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            @include('header')
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            @include('app-sidebar')
            <!--/APP-SIDEBAR-->

            <!--app-content open-->
            @yield('content')
            <!-- CONTAINER END -->
        </div>

        <!--TASK MODAL-->
        @include('task-modal')
        <!--TASK MODAL ENDS-->

        {{-- <!-- Country-selector modal-->
        @include('country-selector-modal')
        <!-- /Country-selector modal--> --}}

        <!-- FOOTER -->
        @include('footer')
        <!-- FOOTER END -->
    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('./assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('./assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- APEXCHART JS -->
    <script src="{{ asset('./assets/js/apexcharts.js') }}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('./assets/plugins/select2/select2.full.min.js') }}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{ asset('./assets/js/circle-progress.min.js') }}"></script>

    <!-- INTERNAL DATA-TABLES JS-->
    <script src="{{ asset('./assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('./assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('./assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>

    {{-- <!-- INDEX JS -->
    <script src="{{ asset('./assets/js/index1.js') }}"></script> --}}

    <!-- REPLY JS-->
    <script src="{{ asset('./assets/js/reply.js') }}"></script>
    <script src="{{ asset('./assets/plugins/sidemenu/sidemenu.js') }}"></script>
    <!-- INTERNAl JQUERY.STEPS JS -->
    <script src="{{ asset('./assets/plugins/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('./assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <!-- INTERNAL ACCORDION-WIZARD-FORM JS-->
    <script src="{{ asset('./assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js') }}"></script>

    <!-- STICKY JS -->
    <script src="{{ asset('./assets/js/sticky.js') }}"></script>

    <!-- COLOR THEME JS -->
    <script src="{{ asset('./assets/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('./assets/js/custom.js') }}"></script>
    <!-- Amaze UI Date Picker js-->
    <script src="{{ asset('./assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>

    <!-- Simple Date Time Picker js-->
    <script src="{{ asset('./assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
    <!-- jQuery UI Date Picker js -->
    <script src="{{ asset('./assets/plugins/date-picker/jquery-ui.js') }}"></script>
    <!-- bootstrap-datepicker js (Date picker Style-01) -->
    <script src="{{ asset('./assets/plugins/bootstrap-datepicker/js/datepicker.js') }}"></script>
    <!-- SELECT2 JS -->
    <script src="{{ asset('./assets/plugins/select2/select2.full.min.js') }}"></script>




    <script src="https://cdn.datatables.net/v/dt/dt-1.13.5/datatables.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- INTERNAL Summernote Editor js -->
    <script src="/assets/plugins/summernote-editor/summernote1.js"></script>
    <script src="/assets/js/summernote.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @yield('js-jquery')

</body>

</html>
