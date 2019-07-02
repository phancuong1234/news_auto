@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Crawler - Auto</h4>
                    @include('common.error')
                    <p class="card-description">
                        Crawl data  từ 1 trang web khác (xml)
                    </p>
                    {!! Form::open(['method' => 'POST', 'route' => 'crawl.xml', 'class' => 'forms-sample', 'id' => 'crawl-xml']) !!}
                    <div>
                        <div class="form-group">
                            {!! Form::label('url', 'Bước 1 : nhập trang web cần crawl ( hiện tại chỉ hổ trợ mỗi trang dân trí )') !!}
                            {!! Form::text('url', '', ['id' => 'urlRSS', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="screen-loader" id="screen-loader">
                        <div class="bubblingG" id="bubblingG">
                            <span id="bubblingG_1">
                            </span>
                            <span id="bubblingG_2">
                            </span>
                            <span id="bubblingG_3">
                            </span>
                        </div>
                        <div class="text-wait" id="text-wait">
                            <i class="mdi mdi-check-circle-outline icon-success" id="icon-success"></i>
                            <i class="mdi mdi-close-circle-outline icon-fail" id="icon-fail"></i>
                            <span class="text-status" id="text-status">Đang chạy dữ liệu ,vui lòng đợi...</span>
                        </div>
                        <div id="screen-info">

                        </div>
                    </div>
                    {!! Form::submit("Bắt đầu", ['class' => 'btn btn-gradient-primary mr-2 btn-sm', 'id' => 'btn-start-crawl-by-rss']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
