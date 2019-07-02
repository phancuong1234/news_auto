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
                <div class="panel-footer">
                    <form class="form-group" id="form-view">
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