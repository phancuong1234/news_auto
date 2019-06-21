@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Quản lý bài viết</h4>
                    @include('common.error')
                    <p class="card-description">
                        Thêm bài viết mới
                    </p>
                    {!! Form::open(['method' => 'POST', 'route' => 'news.store', 'class' => 'forms-sample', 'id' => 'add-news', 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Tiêu Đề') !!}
                            {!! Form::text('title', '', ['id' => 'title', 'class' => 'form-control', 'placeholder' => 'Tiêu đề của tin tức']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('short_description', 'Mô tả ngắn') !!}
                            {!! Form::textarea('short_description', null, ['class' => 'form-control', 'id' => 'short_description', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none', 'placeholder' => 'Viết mô tả ngắn']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('id_category', 'Danh mục') !!}
                            {!! Form::select('id_category', $idCategory, null, ['id' => 'is_active', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Ảnh tải lên</label>
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" placeholder="Upload Image" id="text_image" disabled name="text_image">
                                <div class="input-group-append">
                                    <a id="button" name="button" class= "file-upload-browse btn btn-gradient-primary btn_file" value="Upload" onclick="thisFileUpload();">
                                        Chọn Ảnh
                                    </a>
                                </div>
                            </div>
                            {!! Form::file('image',['style' => "display:none;", 'id' => 'image', 'required'])  !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('content', 'Nội dung bài viết') !!}
                            {!! Form::textarea('content', null, ['id' => 'content']) !!}
                        </div>
                        {!! Form::submit("Thêm", ['class' => 'btn btn-gradient-primary mr-2 btn-sm', 'id' => 'btnAddNews']) !!}
                        <a href="{{ route('news.index') }}" class="btn btn-light btn-sm">Hủy</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
