@extends('admin.layouts.layout')

@section('content')
    <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title"><strong>{{ $otdel->f_name  }} <span class="text-uppercase">({{ $otdel->s_name }})</span></strong></h3>
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
                                    <th>Каб №</th>
                                    <th>Sort</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1
                                @endphp
                                @foreach($workers as $worker)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td><a href="{{ route('worker.edit', $worker->id) }}">{{ $worker->name }}</a></td>
                                        <td>{{ $worker->special->name }}</td>
                                        <td>{{ $worker->vts }}</td>
                                        <td>{{ $worker->gts }}</td>
                                        <td>{{ $worker->kab }}</td>
                                        <td>{{ $worker->sort }}</td>
                                        <td>
                                            <a href="{{ route('worker.edit', $worker->id) }}" class="btn btn-info btn-sm float-left mr-1"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="{{ route('worker.destroy', $worker->id) }}" method="post" class="float-left">
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
                                    <th>ФИО</th>
                                    <th>Должность</th>
                                    <th>ВТС</th>
                                    <th>ГТС</th>
                                    <th>Каб №</th>
                                    <th>Sort</th>
                                    <th>Действие</th>
                                </tr>
                                </tfoot>
                            </table>
                            @else
                                <div class="col-md-12">
                                    <p>Список сотрудников пуст...</p>
                                    <a href="{{ route('worker.create') }}">
                                        <button type="button" class="btn btn-block bg-gradient-primary col-2">Добавить сотрудника</button>
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
