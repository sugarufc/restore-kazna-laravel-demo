@extends('layouts.layout')


@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card mt-2">
                    <div class="card-header">
                        <h3 class="card-title">Список IP адресов</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(count($ip))
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>IP адрес</th>
                                    <th>Наименование</th>
                                    <th>Описание</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1
                                @endphp
                                @foreach($ip as $ips)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $ips->ip }}</td>
                                        <td>{{ $ips->title }}</td>
                                        <td>{{ $ips->desc }}</td>
                                    </tr>
                                    @php
                                        $i++
                                    @endphp
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>IP адрес</th>
                                    <th>Наименование</th>
                                    <th>Описание</th>
                                </tr>
                                </tfoot>
                            </table>
                        @else
                            <div class="col-md-12">
                                <p>Список IP адресов пуст...</p>
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
