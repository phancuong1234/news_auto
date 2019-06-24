@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Số Bài Viết Nhiều Comment Nhất</div>

                <div class="panel-body" id="panel-body">
                    <canvas id="Comment-chart"></canvas>
                </div>
                <div class="panel-footer">
                    <p class="float-left">Xem top comment của tháng :</p>
                    <select class="bmdb-select md-form ml-2" name="month" id="select-month">
                        <option value="" disabled selected>Chọn tháng</option>
                            @for($i=1 ; $i<=12 ; $i++ )
                                <option value="{!! $i !!}">tháng {!! $i !!}</option>
                            @endfor
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection