@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="card m-2">
        <div class="card-header">
            <h3 class="card-title">Редактирование данных сотрудника</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{ route('worker.update', $worker->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                        </div>
                        <input type="text" required name="name" class="@error('name') is-invalid @enderror form-control" value="@if(old('name')) {{old('name')}} @else {{ $worker->name }} @endif" placeholder="ФИО сотрудника">
                    </div>
                    @error('name')
                        <label class="col-form-label text-danger" for="name"><i class="far fa-times-circle"></i> {{ $message }}</label>
                    @enderror
                <!-- /.input group -->
                </div>

                <div class="form-group">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                        </div>
                        <select name="special_id" required id="special_id" class="form-control select2bs4 @error('special_id') is-invalid @enderror custom-select">
                            @foreach($specials as $k=>$v)
                                <option value="{{ $k }}" @if($k === $worker->special->id) selected @endif>{{ $v }}</option>
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
                        <input type="text" name="vts" value="@if(old('vts')) {{old('vts')}} @else {{ $worker->vts }} @endif" placeholder="ВТС" class="@error('vts') is-invalid @enderror form-control">
                    </div>
                    @error('vts')
                        <label class="col-form-label text-danger" for="inputError"><i class="far fa-times-circle"></i> {{ $message }}</label>
                    @enderror
                <!-- /.input group -->
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" name="gts" class="@error('gts') is-invalid @enderror form-control" placeholder="ГТС" value="@if(old('gts')) {{old('gts')}} @else {{ $worker->gts }} @endif">
                    </div>
                    @error('gts')
                        <label class="col-form-label text-danger" for="inputError"><i class="far fa-times-circle"></i> {{ $message }}</label>
                    @enderror
                <!-- /.input group -->
                </div>
                <div class="form-group">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                        </div>
                        <select name="otdel_id" required id="otdel_id" class="form-control select2bs4 @error('otdel_id') is-invalid @enderror custom-select">
                            @foreach($otdels as $k=>$v)
                                @php
                                    if ($v === 'ТОФК'){
                                        continue;
                                    }
                                @endphp
                                <option value="{{ $k }}" @if($k === $worker->otdel_id) selected @endif>{{ $v }}</option>
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
                        <input type="text" name="kab" placeholder="Кабинет" value="@if(old('kab')) {{old('kab')}} @else {{ $worker->kab }} @endif" class="@error('kab') is-invalid @enderror form-control" data-inputmask='"mask": "999"' data-mask>
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
                        <input type="text" name="sort" placeholder="Сортировка" value="@if(old('sort')) {{old('sort')}} @else {{ $worker->sort }} @endif" class="@error('sort') is-invalid @enderror form-control">
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



