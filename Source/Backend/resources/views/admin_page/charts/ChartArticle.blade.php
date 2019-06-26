@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tổng Số Bài Viết Qua Các Tháng</div>

                <div class="panel-body" id="panel-body">
                    <canvas id="Article-chart"></canvas>
                </div>
                <div class="">
                    Xem theo loại bài viết :
                    <select class="bmdb-select md-form" name="month" id="select-cate">
                        <option value="" disabled selected>Chọn Loại</option>
                            @foreach($category as $cate)                
                                <option value="{{$cate->id}}">{{$cate->name_category}}</option>
                            @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection