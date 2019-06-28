@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
@include('common.error')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Số User Đăng Kí Trong Năm</div>
                <div class="panel-body" id="panel-body">
                    <canvas id="user-chart"></canvas>
                </div>
                <div class="panel-footer">
                    <form class="form-group" id="form-user">
                        <label for="select-year-user" class="p-2 bd-highlight">Xem Theo Năm :</label>
                        <input type="text" class="form-control input-year-chart" id="select-year-user" name="selectyear" placeholder="Mời nhập Năm">
                        <button type="submit" id="submit-year-user" class="btn btn-primary btn-sm">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
