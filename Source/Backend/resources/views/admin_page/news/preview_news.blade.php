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
                        Xem bài viết
                    </p>
                    <div class="form-group">
                        {!! Form::label('title', 'Tiêu Đề') !!}
                        {!! Form::text('title', $news->title, ['id' => 'title', 'class' => 'form-control', 'placeholder' => 'Tiêu đề của tin tức', 'disabled']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('short_description', 'Mô tả ngắn') !!}
                        {!! Form::textarea('short_description', $news->short_description, ['class' => 'form-control', 'id' => 'short_description', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none', 'disabled']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('id_category', 'Danh mục') !!}

                    </div>
                    <div class="form-group">
                        <label>Ảnh tải lên</label>
                        <div>
                            <a id="img-preview-tag-a" href="{{ ($typeURL == 1)?$news->image:asset('images/news/'.$news->image) }}">
                                <img class="img-preview" id="img-preview" src="{{ ($typeURL == 1)?$news->image:asset('images/news/'.$news->image) }}"/>
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('url_news', 'Url') !!}
                        {!! Form::text('url_news', $news->url_news, ['id' => 'url_news', 'class' => 'form-control', 'placeholder' => 'link ...', 'disabled']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('content', 'Nội dung bài viết') !!}
                        <div>
                            {!! $html = html_entity_decode($news->content) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('is_active', 'Tình trạng') !!}
                        <div>
                            <label class="badge {{ ($news->is_active == config('setting.is_active.pending'))?"badge-gradient-warning":"badge-gradient-danger" }}">
                                {{ ($news->is_active == config('setting.is_active.pending'))?"Pending":"Reject" }}
                            </label>
                        </div>
                    </div>
                    <a href="javascript:void(0)" style="" onclick="submitFormAcceptNews('accept-news' + {{$news->id}})" class="btn btn-gradient-success btn-rounded btn-sm">
                        <i class="mdi mdi-check-circle"></i>
                        Chấp Nhận
                    </a>
                    <a href="javascript:void(0)" style="" onclick="submitFormDeleteHard('delete-news' + {{$news->id}})" class="btn btn-gradient-danger btn-rounded btn-sm">
                        <i class="mdi mdi-delete"></i>
                        Hủy
                    </a>
                    {!! Form::open(['method' => 'PATCH', 'route' => ['pending.accept.news',$news->id], 'id'=>'accept-news'.$news->id]) !!}
                    {!! Form::close() !!}
                    {!! Form::open(['method' => 'DELETE', 'route' => ['news.destroy',$news->id], 'id'=>'delete-news'.$news->id]) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection
