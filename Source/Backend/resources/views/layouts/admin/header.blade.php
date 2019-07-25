<!DOCTYPE html>
<html lang="vi">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
{{--    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">--}}
    {{ Html::style(asset('/templates/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css')) }}
    {{ Html::style(asset('/templates/admin/vendors/css/vendor.bundle.base.css')) }}
    {{ Html::style(asset('/templates/admin/css/style.css')) }}
    {{ Html::style(asset('/templates/admin/images/favicon.png')) }}
    {{ Html::style(asset('/css/bootstrap-datepicker.css')) }}
    {{ Html::style(asset('/css/bootstrap-select.css')) }}
    {{ Html::script(asset('/js/ckeditor.js')) }}
    {{ Html::style(asset('/templates/common/css/mystyle.css')) }}
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="{{ route('dashboard.index') }}"><img src="{{ asset('/templates/admin/images/logo.svg') }}" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard.index') }}`   `"><img src="{{ asset('/templates/admin/images/logo-mini.svg') }}" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <ul class="navbar-nav navbar-nav-right" id="app">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <div class="nav-profile-img">
                            <img src="{{ (Auth::user()->image != 'no-image.png')? asset('images/avatars/'.Auth::user()->image):asset('templates/images/no-image.png') }}" alt="image">
                            <span class="availability-status online"></span>
                        </div>
                        <div class="nav-profile-text">
                            <p class="mb-1 text-black">{{ Auth::user()->username }}</p>
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="{{ route('profile.index') }}">
                            <i class="mdi mdi-information mr-2 text-danger"></i>
                            Thông tin cá nhân
                        </a>
                        <a class="dropdown-item" href="{{ route('activities.index') }}">
                            <i class="mdi mdi-cached mr-2 text-success"></i>
                            Lịch sử hoạt động
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('login.create') }}">
                            <i class="mdi mdi-logout mr-2 text-primary"></i>
                            Đăng Xuất
                        </a>
                    </div>
                </li>
                <li class="nav-item d-none d-lg-block full-screen-link">
                    <a class="nav-link">
                        <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                    </a>
                </li>
                <notify-layout :userid = "{{ auth()->user()->id }}"></notify-layout>
                <li class="nav-item nav-logout d-none d-lg-block">
                    <a class="nav-link" href="{{ route('login.create') }}">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
