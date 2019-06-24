@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Số View Trong Năm</div>
                <div class="panel-body" id="panel-body">
                    <canvas id="view-chart"></canvas>
                </div>
                <div class="form-group flex-row bd-highlight d-flex">
                    <label for="select-year-user" class="p-2 bd-highlight">Xem Theo Năm :</label>
                    <input type="text" class="form-control w-50 p-2 bd-highlight" id="select-year-view" name="selectyear" placeholder="Mời nhập Năm">
                    <button type="submit" id="submit-year-view" class="btn btn-primary ml-2 btn-sm">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection