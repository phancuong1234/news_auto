@extends('layouts.admin.master')
@section('title')
    Quản lý Cấu Hình RSS
@endsection
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Quản lý Cấu Hình RSS</h4>
                    @include('common.error')
                    <p class="card-description">
                       Sửa cấu hình
                    </p>
                    {!! Form::open(['method' => 'PATCH', 'route' => ['config.update', $config->id], 'class' => 'forms-sample', 'id' => 'edit-config-rss']) !!}
                    <div class="form-group">
                        {!! Form::label('name_page', 'Tên trang') !!}
                        {!! Form::text('name_page', $config->name_page, ['id' => 'name_page', 'class' => 'form-control', 'placeholder' => 'Tên trang']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('name_cate', 'Tên danh mục') !!}
                        {!! Form::text('name_cate', $config->name_cate, ['id' => 'name_cate', 'class' => 'form-control', 'placeholder' => 'Tên danh mục']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('link', 'liên kết') !!}
                        {!! Form::text('link', $config->link, ['id' => 'link', 'class' => 'form-control', 'placeholder' => 'liên kết']) !!}
                    </div>
                    @if(isset($idCateParent))
                        <div class="form-group">
                            {!! Form::label('parent_id', 'Thuộc danh mục cha') !!}
                            {!! Form::select('parent_id', $idCateParent,$config->parent_id, ['id' => 'parent_id', 'class' => 'selectpicker form-control show-tick', 'data-live-search' => 'true' , 'data-size' => '6']) !!}
                        </div>
                    @endif
                    {!! Form::submit("Thêm", ['class' => 'btn btn-gradient-primary mr-2 btn-sm', 'id' => 'btnEditConfigRSS']) !!}
                    <a href="{{ route('config.index') }}" class="btn btn-light btn-sm">Hủy</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
