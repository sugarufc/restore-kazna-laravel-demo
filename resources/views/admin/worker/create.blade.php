@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="card m-2">
        <div class="card-header">
            <h3 class="card-title">Добавление сотрудника</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{ route('worker.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                        </div>
                        <input type="text" required name="name" class="@error('name') is-invalid @enderror form-control" value="{{ old('name') }}" placeholder="ФИО сотрудника">
                    </div>
                    @error('name')
                        <label class="col-form-label text-danger" for="name"><i class="far fa-times-circle"></i> {{ $message }}</label>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                        </div>
                        <select name="special_id" required id="special_id" class="form-control select2bs4 @error('special_id') is-invalid @enderror custom-select">
                            <option value="" disabled selected>Должность</option>
                            @foreach($specials as $k=>$v)
                                <option value="{{ $k }}">{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('special_id')
                        <label class="col-form-label text-danger" for="inputError"><i class="far fa-times-circle"></i> {{ $message }}</label>
                    @enderror
                <!-- /.input group -->
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" name="vts" value="{{ old('vts') }}" placeholder="ВТС" class="@error('vts') is-invalid @enderror form-control">
                    </div>
                    @error('vts')
                        <label class="col-form-label text-danger" for="inputError"><i class="far fa-times-circle"></i> {{ $message }}</label>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" name="gts" class="@error('gts') is-invalid @enderror form-control" placeholder="ГТС" value="{{ old('gts') }}">
                    </div>
                    @error('gts')
                        <label class="col-form-label text-danger" for="inputError"><i class="far fa-times-circle"></i> {{ $message }}</label>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                        </div>
                        <select name="otdel_id" required id="otdel_id" class="form-control select2bs4 @error('otdel_id') is-invalid @enderror custom-select">
                            <option value="">Отдел</option>
                            @foreach($otdels as $k=>$v)
                                @php
                                    if ($v === 'ТОФК'){
                                        continue;
                                    }
                                @endphp
                                <option value="{{ $k }}">{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('otdel_id')
                        <label class="col-form-label text-danger" for="inputError"><i class="far fa-times-circle"></i> {{ $message }}</label>
                    @enderror
                    <!-- /.input group -->
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-laptop-house"></i></span>
                        </div>
                        <input type="text" name="kab" placeholder="Кабинет" value="{{ old('kab')}}" class="@error('kab') is-invalid @enderror form-control">
                    </div>
                    @error('kab')
                        <label class="col-form-label text-danger" for="inputError"><i class="far fa-times-circle"></i> {{ $message }}</label>
                    @enderror
                <!-- /.input group -->
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-sort-alpha-down"></i></span>
                        </div>
                        <input type="text" name="sort" required placeholder="Сортировка" value="{{ old('sort')  ?? 500}}" class="@error('sort') is-invalid @enderror form-control">
                    </div>
                    @error('sort')
                        <label class="col-form-label text-danger" for="inputError"><i class="far fa-times-circle"></i> {{ $message }}</label>
                    @enderror
                <!-- /.input group -->
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
    <!-- /.content -->
@endsection



