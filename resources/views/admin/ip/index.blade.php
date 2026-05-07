@extends('admin.layouts.layout')

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
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>IP адрес</th>
                                    <th>Наименование</th>
                                    <th>Описание</th>
                                    <th>Действие</th>
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
                                        <td>
                                            <a href="{{ route('ip.edit', $ips->id) }}" class="btn btn-info btn-sm float-left mr-1"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="{{ route('ip.destroy', $ips->id) }}" method="post" class="float-left">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Подтвердите удаление')"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
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
                                    <th>Действие</th>
                                </tr>
                                </tfoot>
                            </table>
                        @else
                            <div class="col-md-12">
                                <p>Список IP адресов пуст...</p>
                                <a href="{{ route('ip.create') }}">
                                    <button type="button" class="btn btn-block bg-gradient-primary col-2">Добавить IP адрес</button>
                                </a>
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
