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
                        Chỉnh sửa danh mục
                    </p>
                    {!! Form::open(['method' => 'PATCH', 'route' => ['category.update', $category->id], 'class' => 'forms-sample', 'id' => 'edit-category']) !!}
                    <div class="form-group">
                        {!! Form::label('name_category', 'Tên danh mục') !!}
                        {!! Form::text('name_category', $category->name_category, ['id' => 'name_category', 'class' => 'form-control', 'placeholder' => 'Tên danh mục']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('url_cate', 'Url') !!}
                        {!! Form::text('url_cate', $category->url_cate, ['id' => 'url_cate', 'class' => 'form-control', 'placeholder' => 'link ...']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('is_active', 'Tình trạng') !!}
                        {!! Form::select('is_active', [1 => 'Hoạt động', 0 => 'Khóa'], $category->is_active, ['id' => 'is_active', 'class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit("Sửa", ['class' => 'btn btn-gradient-primary mr-2 btn-sm', 'id' => 'btnEditCt']) !!}
                    <a href="{{ route('category.index') }}" class="btn btn-light btn-sm">Hủy</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
