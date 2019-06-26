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
                    <canvas id="Article-rate-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection