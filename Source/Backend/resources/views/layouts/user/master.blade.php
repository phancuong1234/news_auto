@include('layouts.user.header')
<div class="main">
    <nav aria-label="Page breadcrumb" style="background-color: #e9ecef">
      <div class="container">
        <ol class="breadcrumb menu-nav-bar">
            <li class="breadcrumb-item" >
                <a href="{{ route('home-page') }}">Trang chủ</a>
            </li>
            @hasSection('page')
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="@yield('url-page')">
                        @yield('page')
                    </a>
                </li>
            @endif
            <li class="dropdown login-nav-bar" >
                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button">
                    {{ (Auth::check())?Auth::user()->username:'Đăng Nhập' }}
                    <span class="caret"></span>
                </a>
                <div class="dropdown-menu">
                    @if(Auth::check())
                        <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#myModal">Thông tin</a>
                        <a class="dropdown-item" href="{{ route('login.create') }}">Đăng Xuất</a>
                    @else
                        <a class="dropdown-item" href="{{ route('login.index') }}">Đăng Nhập</a>
                        <a class="dropdown-item" href="{{ route('register.index') }}">Đăng Kí</a>
                    @endif
                </div>
            </li>
          </ol>
      </div>
    </nav>
    <div class="container mt-4 mb-5">
      <div class="row">
    <!-- Modal -->
    @if(Auth::check())
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Thông tin</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group img-modal">
              <a href="javascript:void(0)" id="link-to-change">
                @if(Auth::check())
                  <img style="width: 92%;" id="img-preview" class="no-img-modal"  src="{{ (trim(auth()->user()->image) == '' || auth()->user()->image == 'no-image.png') ? asset('/templates/images/no-image.png'):asset('/images/avatars/'.Auth::user()->image) }}" />
                @else
                  <img style="width: 75%;" id="img-preview" src="{{ asset('/templates/images/no-image.png') }}" />
                @endif
              </a>
            </div>
            {!!Form::open(['method'=>'PATCH', 'id'=>'change-profile-modal', 'route'=>['change.profile', Auth::user()->id]]) !!}
            {!! Form::file('image', ['id' => 'image', 'style' => 'display:none']) !!}
              <div class="form-group">
                {!! Form::label('fullname', 'Họ và tên',['class'=>'label-modal']) !!}
                {!! Form::text('fullname', Auth::user()->fullname , ['class'=>'form-control inp-profile', 'placeholder'=>'Nhập Họ Tên Đầy Đủ', 'disabled'=>'true']) !!}
                <label id="address-error" class="error" for="fullname"></label>
              </div>
              <div class="form-group">
                {!! Form::label('phone', 'Số điện thoại',['id'=>'label-phone','class'=>'label-modal']) !!}
                {!! Form::text('phone',Auth::user()->phone, ['class'=>'form-control inp-profile', 'placeholder'=>'Nhập Số Điện thoại', 'disabled'=>'true']) !!}
                <label id="address-error" class="error no-img" for="phone"></label>
              </div>
              <div class="form-group">
                {!! Form::label('gender', 'Giới tính',['id'=>'label-gender','class'=>'label-modal-2']) !!}
                {!! Form::select('gender', ['male' => 'Nam', 'female' => 'Nữ'],Auth::user()->gender,['class' => 'form-control inp-profile','disabled'=>'true']) !!}
                <label id="address-error" class="error no-img" for="phone"></label>
              </div>
              <div class="form-group">
                {!! Form::label('address', 'Địa chỉ',['class'=>'label-modal-2']) !!}
                {!! Form::text('address', Auth::user()->address , ['class'=>'form-control inp-profile', 'placeholder'=>'Nhập địa chỉ','disabled'=>'true']) !!}
                <label id="address-error" class="error no-img" for="address"></label>
              </div>
              <div class="form-group">
                {!! Form::label('birthday', 'Ngày sinh',['class'=>'label-modal-2']) !!}
                {!! Form::text('birth_date', Auth::user()->birth_date , ['class'=>'form-control inp-profile', 'placeholder'=>'ngày sinh','disabled'=>'true']) !!}
                <label id="address-error" class="error no-img" for="birth_date"></label>
              </div>
            {!! Form::close() !!}
            <button data-toggle="modal" data-target="#PassModal" id="modal-change-pass" class="btn btn-primary btn-change-pass">Đổi mật khẩu</button>
            <button id="btn-change-profile" class="btn btn-primary btn-change-profile">Sửa thông tin</button>
          </div>
        </div>
      </div>
    </div>
    <div id="PassModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Đổi mật khẩu</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            {!!Form::open(['method'=>'PATCH', 'id' => 'form-change-pass', 'route'=>['change.pass', Auth::user()->id]]) !!}
              <div class="form-group">
                {!! Form::label('oldpass', 'Mật khẩu cũ') !!}
                {!! Form::password('oldpass', ['class'=>'form-control', 'placeholder'=>'Mật khẩu cũ']) !!}
              </div>
              <div class="form-group">
                {!! Form::label('password', 'Mật khẩu mới') !!}
                {!! Form::password('password',  ['class'=>'form-control','id'=>'password', 'placeholder'=>'Mật khẩu mới']) !!}
              </div>
              <div class="form-group">
                {!! Form::label('repass', 'Xác nhận mật khẩu') !!}
                {!! Form::password('repass',  ['class'=>'form-control', 'placeholder'=>'Xác nhận mật khẩu']) !!}
              </div>
            {!! Form::close() !!}
              <button id="btn-change-pass" class="btn btn-primary btn-change-profile">Lưu mật khẩu</button>
            </div>
          </div>
        </div>
      </div>
    @endif
@yield('content')
@include('layouts.user.rightbar')
@include('layouts.user.footer')
