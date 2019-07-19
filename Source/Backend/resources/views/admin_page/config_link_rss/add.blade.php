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
                        Thêm cấu hình mới
                    </p>
                    {!! Form::open(['method' => 'POST', 'route' => 'config.store', 'class' => 'forms-sample', 'id' => 'add-config-rss']) !!}
                    <div class="form-group">
                        {!! Form::label('name_page', 'Tên trang') !!}
                        {!! Form::text('name_page', '', ['id' => 'name_page', 'class' => 'form-control', 'placeholder' => 'Tên trang']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('name_cate', 'Tên danh mục') !!}
                        {!! Form::text('name_cate', '', ['id' => 'name_cate', 'class' => 'form-control', 'placeholder' => 'Tên danh mục']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('link', 'liên kết') !!}
                        {!! Form::text('link', '', ['id' => 'link', 'class' => 'form-control', 'placeholder' => 'liên kết']) !!}
                    </div>
                    @if(isset($idCateParent))
                        <div class="form-group">
                            {!! Form::label('parent_id', 'Thuộc danh mục cha') !!}
                            {!! Form::select('parent_id', $idCateParent, null, ['id' => 'parent_id', 'class' => 'selectpicker form-control show-tick', 'data-live-search' => 'true' , 'data-size' => '6', 'style' => 'font-family: ']) !!}
                        </div>
                    @endif
                    {!! Form::submit("Thêm", ['class' => 'btn btn-gradient-primary mr-2 btn-sm', 'id' => 'btnAddConfigRSS']) !!}
                    <a href="{{ route('config.index') }}" class="btn btn-light btn-sm">Hủy</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
