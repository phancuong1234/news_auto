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
                        Crawl data từ 1 trang web khác
                    </p>
                    <div>
                        <div class="form-group">
                            {!! Form::label('url', 'Bước 1 : chọn trang web cần crawl ( hiện tại chỉ hổ trợ mỗi trang dân trí )') !!}
                            {!! Form::select('url', ['https://dantri.com.vn/' => 'Báo Dân Trí'], null, ['id' => 'url', 'class' => 'form-control']) !!}
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
                        <div class="screen-info" id="screen-info">
                            <span class="text-infomation">Thông tin tiến trình: </span>
                            <div class="info-of-crawl" id="info-of-crawl">

                            </div>
                        </div>
                    </div>
                        <button class="btn btn-gradient-primary mr-2 btn-sm" id="btn-start-crawl">
                        <i src="mdi mdi-arrow-down-bold-circle-outline"></i>
                        Bắt đầu
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
