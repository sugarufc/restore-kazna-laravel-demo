@extends('layouts.layout')

@section('sidebar')
        <!-- Sidebar Menu -->
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
                    <ul class="nav nav-treeview text-sm">
                        @foreach($otdels as $otdel)
                            @if($otdel->slug === 'tofk') @php continue; @endphp @endif
                            @if(!$otdel->parent_id)
                                <li class="nav-item">
                                    <a href="{{ route('worker', $otdel->id) }}" class="nav-link py-0">
                                        <i class="fas fa-minus"></i>
                                        <p class="text-uppercase">{{ $otdel->s_name }}</p>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                        @if(count($otdels))
                            <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-minus"></i>
                                <p>ТОФК<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach($otdels as $otdel)
                                    @if($otdel->parent_id)
                                        <li class="nav-item">
                                            <a href="{{ route('worker', $otdel->id) }}" class="nav-link py-0" title="{{ $otdel->s_name }}">
                                                <i class="fas fa-minus"></i>
                                                <small><p class="text-uppercase">{{ mb_substr(str_replace('району','р-ну',$otdel->f_name), 6, 23) }}</p></small>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ip') }}" class="nav-link">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>IP адреса</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card mt-2">
                    <div class="card-header">
                        @isset($otd_name)
                            <h3 class="card-title font-weight-bold">{{ $otd_name->f_name }} <span class="text-uppercase">({{ $otd_name->s_name }})</span></h3>
                        @else
                            <h3 class="card-title">Список сотрудников ФК по РД</h3>
                        @endisset
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(count($workers))
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ФИО</th>
                                    <th>Должность</th>
                                    <th>ВТС</th>
                                    <th>ГТС</th>
                                    <th>Отдел</th>
                                    <th>Каб №</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1
                                @endphp
                                @foreach($workers as $worker)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $worker->name }}</td>
                                        <td>{{ $worker->special->name }}</td>
                                        <td>{{ $worker->vts }}</td>
                                        <td>{{ $worker->gts }}</td>
                                        <td class="text-uppercase"><a href="{{ route('worker', $worker->otdel->id) }}">{{ $worker->otdel->s_name }}</a></td>
                                        <td>{{ $worker->kab }}</td>
                                    </tr>
                                    @php
                                        $i++
                                    @endphp
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>ФИО</th>
                                    <th>Должность</th>
                                    <th>ВТС</th>
                                    <th>ГТС</th>
                                    <th>Отдел</th>
                                    <th>Каб №</th>
                                </tr>
                                </tfoot>
                            </table>
                        @else
                            <div class="col-md-12">
                                <p>Список сотрудников пуст...</p>
                            </div>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
