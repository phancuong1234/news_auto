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
                        Chỉnh sửa bài viết
                    </p>
                    {!! Form::open(['method' => 'PATCH', 'route' => ['news.update', $news->id], 'class' => 'forms-sample', 'id' => 'edit-news', 'files' => true]) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Tiêu Đề') !!}
                        {!! Form::text('title', $news->title, ['id' => 'title', 'class' => 'form-control', 'placeholder' => 'Tiêu đề của tin tức']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('short_description', 'Mô tả ngắn') !!}
                        {!! Form::textarea('short_description', $news->short_description, ['class' => 'form-control', 'id' => 'short_description', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none', 'placeholder' => 'Viết mô tả ngắn']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('id_category', 'Danh mục') !!}
                        {!! Form::select('id_category', $idCategory, $news->id_category, ['id' => 'is_active', 'class' => 'selectpicker form-control', 'data-live-search' => 'true' , 'data-size' => '6']) !!}
                    </div>
                    <div class="form-group">
                        <label>Ảnh tải lên</label>
                        <div>
                            <a id="img-preview-tag-a" href="{{ ($typeURL == config('setting.URL_image.type_url.crawl'))?$news->image:asset('images/news/'.$news->image) }}">
                                <img class="img-preview" id="img-preview" src="{{ ($typeURL == config('setting.URL_image.type_url.crawl'))?$news->image:asset('images/news/'.$news->image) }}"/>
                            </a>
                        </div>
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" placeholder="Upload Image" id="text_image" disabled name="text_image">
                            <div class="input-group-append">
                                <a id="button" name="button" class= "file-upload-browse btn btn-gradient-primary btn_file" value="Upload" onclick="thisFileUpload();">Chọn Ảnh</a>
                                {!! Form::file('image',['style' => "display:none;", 'id' => 'image'])  !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('url_news', 'Url') !!}
                        {!! Form::text('url_news', $news->url_news, ['id' => 'url_news', 'class' => 'form-control', 'placeholder' => 'link ...']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('content', 'Nội dung bài viết') !!}
                        {!! Form::textarea('content', $news->content, ['id' => 'content']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('is_active', 'Tình trạng') !!}
                        {!! Form::select('is_active', [1 => 'Hoạt động', 0 => 'Khóa'], $news->is_active, ['id' => 'is_active', 'class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit("Sửa", ['class' => 'btn btn-gradient-primary mr-2 btn-sm', 'id' => 'btnAddNews']) !!}
                    <a href="{{ route('news.index') }}" class="btn btn-light btn-sm">Hủy</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection
