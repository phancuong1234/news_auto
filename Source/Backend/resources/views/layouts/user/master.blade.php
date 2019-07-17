@include('layouts.user.header')
<div class="main">
    <nav aria-label="Page breadcrumb" style="background-color: #e9ecef">
      <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" ><a href="home.html">Trang chủ</a></li>
            @if(Auth::check())
              <div class="right-login"><p>Hello !! {{Auth::user()->username}} </p> / <a href="{{route('login.store')}}">Đăng Xuất</a></div>
            @else
              <li class="breadcrumb-item active" aria-current="page"><a href="category.html">Sự kiện</a></li>
              <div class="right"><a href="{{route('login.index')}}">Đăng nhập</a> / <a href="{{route('register.index')}}">Đăng ký</a></div>
            @endif
          </ol>
      </div>
    </nav>
    <div class="container mt-4 mb-5">
      <div class="row">
        @yield('content')
@include('layouts.user.rightbar')
@include('layouts.user.footer')