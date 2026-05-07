<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Администратор | УФК по РД</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

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
    <nav class="main-header navbar navbar-expand navbar-dark navbar-danger">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('admin.index') }}" class="nav-link">Главная</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('logout') }}" class="nav-link"><i class="fas fa-sign-out-alt"></i> Выход</a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4 sidebar-dark-danger">
        <!-- Brand Logo -->
        <a href="{{ url('/') }}" target="_blank" class="brand-link">
            <img src="{{ asset('assets/admin') }}/dist/img/logo.png"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">На сайт</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('assets/admin') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ route('admin.index') }}" class="d-block">Администратор</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('admin.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Главная</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{ route('otdel.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Отделы<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview nav-compact">
                            <li class="nav-item">
                                <a href="{{ route('otdel.index') }}" class="nav-link">
                                    <i class="fas fa-copy"></i>
                                    <p>Список отделов</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('otdel.create') }}" class="nav-link">
                                    <i class="fas fa-plus"></i>
                                    <p>Добавить отдел</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{ route('worker.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>Сотрудники<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview nav-compact">
                            <li class="nav-item">
                                <a href="{{ route('worker.index') }}" class="nav-link">
                                    <i class="fas fa-copy"></i>
                                    <p>Список сотрудников</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('worker.create') }}" class="nav-link">
                                    <i class="fas fa-plus"></i>
                                    <p>Добавить сотрудника</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview danger">
                        <a href="{{ route('page.index') }}" class="nav-link disabled">
                            <i class="nav-icon fas fa-window-restore"></i>
                            <p>Страницы<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview nav-compact">
                            <li class="nav-item">
                                <a href="{{ route('page.index') }}" class="nav-link">
                                    <i class="fas fa-copy"></i>
                                    <p>Список страниц</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('page.create') }}" class="nav-link">
                                    <i class="fas fa-plus"></i>
                                    <p>Добавить страницу</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{ route('ip.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-desktop"></i>
                            <p>IP адреса<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview nav-compact">
                            <li class="nav-item">
                                <a href="{{ route('ip.index') }}" class="nav-link">
                                    <i class="fas fa-copy"></i>
                                    <p>Список IP адресов</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('ip.create') }}" class="nav-link">
                                    <i class="fas fa-plus"></i>
                                    <p>Добавить IP адрес</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('settings') }}" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>Настройки</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @if(session()->has('success'))
            <div class="container">
                <div class="row">
                    <div class="col-md-6 pt-3 m-auto">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5 class="mb-0"><i class="icon fas fa-check"></i>{{session('success')}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(session()->has('warning'))
            <div class="container">
                <div class="row">
                    <div class="col-md-6 pt-3 m-auto">
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5 class="mb-0"><i class="icon fas fa-exclamation-triangle"></i>{{session('warning')}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(config('app.demo_mode') && ! config('app.demo_allow_writes'))
            <div class="container">
                <div class="row">
                    <div class="col-md-8 pt-3 m-auto">
                        <div class="alert alert-info">
                            Демо-режим: админка открыта для просмотра, сохранение изменений отключено.
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer text-sm">
        <div class="float-right d-none d-sm-block">
            <i class="fas fa-phone-square-alt"></i>
            <b>41-00</b>
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
            "paging": false,
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
