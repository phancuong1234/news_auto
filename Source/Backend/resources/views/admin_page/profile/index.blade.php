@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title mb-4">
                        @include('common.error')
                        <div class="d-flex justify-content-start">
                            <div class="image-container">
                                <img src="{{ (Auth::user()->image != 'no-image.png')?asset('images/avatars/'.Auth::user()->image):asset('templates/images/no-image.png') }}" id="img-preview" style="width: 150px; height: 150px" class="img-thumbnail" />
                                <div class="middle">
                                    {!! Form::open(['method' => 'PATCH', 'route' => ['profile.update', Auth::user()->id], 'files' => true, 'id' => 'changeAva']) !!}
                                        <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Thay Đổi" />
                                        {!! Form::file('file', ['id' => 'file', 'style' => 'display:none;']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            <div class="userData ml-3">
                                <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);">{{ Auth::user()->username }}</a></h2>
                                <h6 class="d-block">Bài Đăng : <a href="javascript:void(0)">1,500</a></h6>
                                <h6 class="d-block">Ranking : <a href="javascript:void(0)">1</a></h6>
                            </div>
                            <div class="ml-auto">
                                <input type="button" class="btn btn-danger btn-sm d-none" id="btnDiscard" value="Loại bỏ thay đổi" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Thông tin</a>
                                </li>
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Connected Services</a>--}}
{{--                                </li>--}}
                            </ul>
                            <div class="tab-content ml-1" id="myTabContent">
                                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Họ tên</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{ Auth::user()->fullname }}
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Email</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{ Auth::user()->email }}
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Ngày sinh</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{ Auth::user()->birth_date }}
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Số điện thoại</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{ Auth::user()->phone }}
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Địa chỉ</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{ Auth::user()->address }}
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Giới tính</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{ (Auth::user()->gender == config('setting.gender.male'))? "Nam":"Nữ" }}
                                        </div>
                                    </div>
                                    <hr />
                                </div>
                            </div>
                        </div>
                        <div style="margin-left: 2%">
                            <input type="button" class="btn btn-danger btn-sm" id="btnChangeInfo" value="Thay đổi" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
