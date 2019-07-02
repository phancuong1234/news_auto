@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Top 10 BTV có nhiều bài viết nhất </div>
                <div class="panel-body" id="panel-body">
                    <canvas id="top-btv-chart"></canvas>
                </div>
                <div class="panel-footer">
                    <form id="form-top-mod" >
                        <p class="float-left mt-2">Chọn Thời điểm xem :</p>
                        <input type="text" class="form-control input-year-chart" id="select-year-top-btv" name="selectyear" placeholder="Mời nhập Năm">
                        <select class="form-control select-month-chart" name="month" id="select-month-top-btv">
                            <option value="0" selected>Chọn tháng</option>
                                @for($i=1 ; $i<=12 ; $i++ )
                                    <option value="{!! $i !!}">tháng {!! $i !!}</option>
                                @endfor
                        </select>
                        <button type="submit" id="submit-time-top-btv" class="btn btn-primary btn-sm">Submit</button>
                    </form>           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection