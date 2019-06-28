@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Top 10 bài viết có lượt xem nhiều nhất </div>
                <div class="panel-body" id="panel-body">
                    <canvas id="Article-top-view-chart"></canvas>
                </div>
                <div class="panel-footer">
                    <p class="float-left mt-2">Chọn Thời điểm xem :</p>
                    <div class="form-group flex-row bd-highlight d-flex">
                        <input type="text" class="form-control w-50 p-2 bd-highlight" id="select-year-top-view" name="selectyear" placeholder="Mời nhập Năm">
                        <select class="bmdb-select md-form ml-2 p-2 bd-highlight" name="month" id="select-month-top-view">
                            <option value="0" selected>Chọn tháng</option>
                                @for($i=1 ; $i<=12 ; $i++ )
                                    <option value="{!! $i !!}">tháng {!! $i !!}</option>
                                @endfor
                        </select>
                        <button type="submit" id="submit-time-top-view" class="btn btn-primary ml-2 btn-sm">Submit</button>
                    </div>             
                </div>
            </div>
        </div>
    </div>
</div>
@endsection