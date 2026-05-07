<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>УФК по РД</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="{{ asset('css') }}/style.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('home') }}" class="nav-link">Главная</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">СКИАО</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                    <li><a href="#" class="dropdown-item">СКИАО СПД</a></li>
                    <li><a href="#" class="dropdown-item">СКИАО ГГС</a></li>
                    <li><a href="#" class="dropdown-item">Правовая работа</a></li>
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('admin.index') }}" class="nav-link"><i class="fas fa-user-lock"></i> Вход</a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4 overflow-hidden">
        <!-- Brand Logo -->
        <a href="{{ route('workers') }}" class="brand-link">
            <img src="{{ asset('assets/admin') }}/dist/img/logo.png"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">УФК по РД</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            @section('sidebar')
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Главная</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{ route('workers') }}" class="nav-link">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Отделы<i class="right fas fa-angle-left"></i></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ip') }}" class="nav-link">
                            <i class="nav-icon fas fa-desktop"></i>
                            <p>IP адреса</p>
                        </a>
                    </li>
                </ul>
            </nav>
            @show
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer text-sm">
        <div class="float-right d-none d-sm-block">
            <a href="{{ route('worker', 17) }}" class="link-black">
            <b>ОИС</b>
            <i class="fas fa-phone-square-alt"></i>
            <b>41-00</b></a>
        </div>
        <strong>Copyright &copy; 2020</strong>
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/admin') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin') }}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/admin') }}/dist/js/demo.js"></script>

<script src="{{ asset('assets/admin') }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
    $('.nav-sidebar a').each(function () {
        let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
        let link = this.href;
        if (link == location){
            $(this).addClass('active');
            $(this).closest('.has-treeview').addClass('menu-open');
        }
    });

    $(function () {
        $("#example1").DataTable({
            "fnDrawCallback": function(oSettings) {
                if ($('#example1_paginate li').length < 6) {
                    $('.dataTables_paginate').hide();
                }else{
                    $('.dataTables_paginate').show();
                }},
            "pagingType": "full_numbers",
            "pageLength" : 20,
            "language": {
                "lengthMenu": 'Показать <select class="custom-select custom-select-sm form-control form-control-sm">'+
                    '<option value="10">10</option>'+
                    '<option value="50">50</option>'+
                    '<option value="-1">Все</option>'+
                    '</select>',
            },
            "info": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>

<!-- Select2 -->
<script src="{{ asset('assets/admin') }}/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('assets/admin') }}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="{{ asset('assets/admin') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Page script -->
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Money Euro
        $('[data-mask]').inputmask()
    })
</script>

</body>
</html>
