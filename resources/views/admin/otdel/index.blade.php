@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card mt-2">
                    <div class="card-header">
                        <h3 class="card-title">Список отделов ФК по РД</h3>
                    </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if(count($otdels))
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Полное наименование</th>
                    <th>Отдел</th>
                    <th>УФК/ТОФК</th>
                    <th style="width: 40px">Sort</th>
                    <th style="width: 40px">Действие</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach($otdels as $otdel)
                    @php
                        if ($otdel->slug === 'tofk'){
                            continue;
                        }
                    @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td><a href="{{ route('worker.show', $otdel->id) }}">{{ $otdel->f_name }}</a></td>
                        <td class="text-uppercase"><a href="{{ route('worker.show', $otdel->id) }}">{{ $otdel->s_name }}</a></td>
                        <td class="text-uppercase">
                            @if($otdel->parent_id)
                                ТОФК
                            @else
                                УФК
                            @endif
                        </td>
                        <td>{{ $otdel->sort }}</td>
                        <td>
                            <a href="{{ route('otdel.edit', $otdel->id) }}" class="btn btn-info btn-sm float-left mr-1"><i class="fas fa-pencil-alt"></i></a>
                            <form action="{{ route('otdel.destroy', $otdel->id) }}" method="post" class="float-left">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Отдел и все сотрудники отдела будут удалены')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @php($i++)
                @endforeach
                </tbody>
            </table>
            @else
            <div class="col-md-12">
                <p>Список отделов пуст...</p>
                <a href="{{ route('otdel.create') }}">
                    <button type="button" class="btn btn-block bg-gradient-primary col-2">Добавить отдел</button>
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
