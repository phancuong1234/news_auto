@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Số User Đăng Kí Trong Năm</div>

                <div class="panel-body">
                    <canvas id="user-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
