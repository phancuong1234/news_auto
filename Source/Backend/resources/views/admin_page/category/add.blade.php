@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Quản lý Danh Mục</h4>
                    @include('common.error')
                    <p class="card-description">
                        Thêm danh mục mới
                    </p>
                    {!! Form::open(['method' => 'POST', 'route' => 'categories.store', 'class' => 'forms-sample', 'id' => 'add-category']) !!}
                        <div class="form-group">
                            {!! Form::label('name_category', 'Tên danh mục') !!}
                            {!! Form::text('name_category', '', ['id' => 'name_category', 'class' => 'form-control', 'placeholder' => 'Tên danh mục']) !!}
                        </div>
                        {!! Form::submit("Thêm", ['class' => 'btn btn-gradient-primary mr-2 btn-sm', 'id' => 'btnAddCt']) !!}
                        <a href="{{ route('category.index') }}" class="btn btn-light btn-sm">Hủy</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
