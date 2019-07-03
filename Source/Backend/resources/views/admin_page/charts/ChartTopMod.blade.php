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
                        <div class="from-group">
                            <label>Chọn Thời điểm xem :</label>
                            <input type="text" class="form-control input-year-chart ml-4" id="select-year-top-btv" name="selectyear" placeholder="Mời nhập Năm">
                            <select class="form-control select-month-chart" name="month" id="select-month-top-btv">
                                <option value="0" selected>Chọn tháng</option>
                                    @for($i=1 ; $i<=12 ; $i++ )
                                        <option value="{!! $i !!}">tháng {!! $i !!}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="from-group mt-2">
                            <label>Chọn số lượng hiển thị :</label>
                            <input type="text" class="form-control input-year-chart" id="select-amount" name="amount" placegolder="mời nhập số lượng"> 
                            <button type="submit" id="submit-time-top-btv" class="btn btn-primary btn-sm">Submit</button>
                        </div> 
                    </form>            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection