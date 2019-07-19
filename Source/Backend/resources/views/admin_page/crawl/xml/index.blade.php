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
                            @if(isset($listIdConfigRSS))
                                {!! Form::select('url', $listIdConfigRSS, null, ['id' => 'urlRSS', 'class' => 'selectpicker form-control show-tick', 'data-live-search' => 'true' , 'data-size' => '6']) !!}
                            @else
                                {!! Form::text('no-infomation', 'Không có cấu hình nào được cài đặt sẵn', ['class' => 'form-control', 'disabled' => true]) !!}
                            @endif
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
                    @if(isset($listIdConfigRSS))
                        {!! Form::submit("Bắt đầu", ['class' => 'btn btn-gradient-primary mr-2 btn-sm', 'id' => 'btn-start-crawl-by-rss']) !!}
                    @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
