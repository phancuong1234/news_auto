@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Số View Trong Năm</div>

                <div class="panel-body">
                    <canvas id="view-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection