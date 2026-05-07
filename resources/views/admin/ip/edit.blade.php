@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="card m-2">
        <div class="card-header">
            <h3 class="card-title">Добавление IP</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{ route('ip.update', $ip->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                        </div>
                        <input type="text" value="{{ $ip['ip'] }}" required placeholder="IP" name="ip" class="@error('ip') is-invalid @enderror form-control" data-inputmask="'alias': 'ip'" data-mask>
                    </div>
                    @error('ip')
                    <label class="col-form-label text-danger" for="inputError"><i class="far fa-times-circle"></i> {{ $message }}</label>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        </div>
                        <input type="text" value="{{ $ip['title'] }}" required name="title" class="@error('title') is-invalid @enderror form-control" value="{{ old('title') }}" placeholder="Наименование">
                    </div>
                    @error('title')
                        <label class="col-form-label text-danger" for="title"><i class="far fa-times-circle"></i> {{ $message }}</label>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pencil-ruler"></i></span>
                        </div>
                        <input type="text" required name="desc" value="{{ $ip['desc'] }}" class="@error('desc') is-invalid @enderror form-control" value="{{ old('desc') }}" placeholder="Описание">
                    </div>
                    @error('desc')
                    <label class="col-form-label text-danger" for="desc"><i class="far fa-times-circle"></i> {{ $message }}</label>
                    @enderror
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



