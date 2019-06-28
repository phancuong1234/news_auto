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
                <div class="panel-footer">
                    <p class="float-left ml-2">Xem theo loại bài viết :</p>
                    <select class="bmdb-select md-form" name="month" id="select-cate">
                        <option value="" disabled selected>Chọn Loại</option>
                            @foreach($category as $cate)                
                                <option value="{{$cate->id}}">{{$cate->name_category}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group flex-row bd-highlight d-flex mt-3">
                        <label for="select-year-user" class="p-2 bd-highlight">Xem Theo Năm :</label>
                        <input type="text" class="form-control w-50 p-2 bd-highlight" id="select-year-art" name="selectyear" placeholder="Mời nhập Năm">
                        <button type="submit" id="submit-year-art" class="btn btn-primary ml-2 btn-sm">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection