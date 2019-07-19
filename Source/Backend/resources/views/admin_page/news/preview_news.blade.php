@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Xem trước bài viết</h4>
                    @include('common.error')
                    <p class="card-description">
                        Xem bài viết
                    </p>
                    <div class="form-group">
                        <h1> {{ $news->title }}</h1>
                        <p>{{ $news->short_description }}</p>
                        <p>{!! $html = html_entity_decode($news->content) !!}</p>
                    </div>
                    @if($typePreview == config('setting.type_preview.preview_of_news_pending') && auth()->user()->id_role != config('setting.role.editor'))
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
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection
