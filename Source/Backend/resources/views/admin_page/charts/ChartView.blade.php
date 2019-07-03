@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" id="panel">
                <div class="panel-heading" id="change-panel" >Số View Trong Năm</div>
                <div class="panel-body" id="panel-body">
                    <canvas id="view-chart"></canvas>
                </div>
                <div class="panel-footer">
                <p class="float-left ml-2 mt-2">Xem theo danh mục:</p>
                    <button class="btn btn-primary ml-3" id="view-by-cate">Xem theo danh mục</button>
                    <form class="form-group mt-3" id="form-view">
                        <label for="select-year-view" class="p-2 bd-highlight">Xem Theo Năm :</label>
                        <input type="text" class="form-control input-year-chart" id="select-year-view" name="selectyear" placeholder="Mời nhập Năm">
                        <button type="submit" id="submit-year-view" class="btn btn-primary btn-sm">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection