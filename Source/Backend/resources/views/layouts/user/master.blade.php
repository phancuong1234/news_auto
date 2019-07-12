@include('layouts.user.header')
<div class="main">
    <nav aria-label="Page breadcrumb" style="background-color: #e9ecef">
      <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" ><a href="home.html">Trang chủ</a></li>
            @if(Auth::check())
              <div class="right-login">
                <p>Hello !! {{Auth::user()->username}} </p> 
                &nbsp/&nbsp <a href="" data-toggle="modal" data-target="#myModal"> Thông tin</a>
                &nbsp/&nbsp <a href="{{route('login.create')}}"> Đăng Xuất</a>
              </div>
            @else
              <li class="breadcrumb-item active" aria-current="page"><a href="category.html">Sự kiện</a></li>
              <div class="right">
                <a href="{{route('login.index')}}">Đăng nhập</a>
                / 
                <a href="{{route('register.index')}}">Đăng ký</a>
              </div>
            @endif
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
            <h4 class="modal-title">Profile</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button> 
          </div>
          <div class="modal-body">
            <div class="form-group img-modal">
            <a href="javascript:void(0)" id="link-to-change"><img src="{{ asset('images/avatars/'.auth()->user()->image) }}" id="img-preview" style="width: 150px; height: 150px" class="img-thumbnail" /></a>
            </div>
            {!!Form::open(['method'=>'PATCH', 'id'=>'change-profile-modal', 'route'=>['change.profile', Auth::user()->id]]) !!} 
            {!! Form::file('image', ['id' => 'image', 'style' => 'display:none']) !!}  
            <div class="form-group">
                {!! Form::label('fullname', 'FullName',['class'=>'label-modal']) !!}
                {!! Form::text('fullname', Auth::user()->fullname , ['class'=>'form-control inp-profile', 'placeholder'=>'FullName', 'disabled'=>'true']) !!}
              </div>   
              <div class="form-group">
                {!! Form::label('phone', 'Phone',['class'=>'label-modal']) !!}
                {!! Form::text('phone',Auth::user()->phone, ['class'=>'form-control inp-profile', 'placeholder'=>'Phone', 'disabled'=>'true']) !!}
              </div>
              <div class="form-group">
                {!! Form::label('gender', 'Gender',['class'=>'label-modal-2']) !!}
                {!! Form::select('gender', ['male' => 'Male', 'female' => 'Female'],Auth::user()->gender,['class' => 'form-control inp-profile','disabled'=>'true']) !!}
              </div>
              <div class="form-group">
                {!! Form::label('address', 'Address',['class'=>'label-modal-2']) !!}
                {!! Form::text('address', Auth::user()->address , ['class'=>'form-control inp-profile', 'placeholder'=>'Location','disabled'=>'true']) !!}
              </div>
              <div class="form-group">
                {!! Form::label('birthday', 'Birthday',['class'=>'label-modal-2']) !!}
                {!! Form::text('birth-date', Auth::user()->birth_date , ['class'=>'form-control inp-profile', 'placeholder'=>'birthday','disabled'=>'true']) !!}
              </div>
            {!! Form::close() !!}
            <button data-toggle="modal" data-target="#PassModal" id="modal-change-pass" class="btn btn-primary btn-change-pass">Change password</button>
            <button id="btn-change-profile" class="btn btn-primary btn-change-profile">Change profile</button>
          </div>
        </div>
      </div>
    </div>
    <div id="PassModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Change Password</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button> 
            </div>
            <div class="modal-body">
            {!!Form::open(['method'=>'PATCH', 'id' => 'form-change-pass', 'route'=>['change.pass', Auth::user()->id]]) !!} 
              <div class="form-group">
                {!! Form::label('oldpass', 'Old Password') !!}
                {!! Form::password('oldpass', ['class'=>'form-control', 'placeholder'=>'old pass']) !!}
              </div>   
              <div class="form-group">
                {!! Form::label('newpass', 'New Password') !!}
                {!! Form::password('password',  ['class'=>'form-control','id'=>'password', 'placeholder'=>'new pass']) !!}
              </div>   
              <div class="form-group">
                {!! Form::label('repass', 'Re Password') !!}
                {!! Form::password('repass',  ['class'=>'form-control', 'placeholder'=>'re pass']) !!}
              </div>  
            {!! Form::close() !!}  
              <button id="btn-change-pass" class="btn btn-primary btn-change-profile">Change</button>
            </div>
          </div>
        </div>
      </div>
    @endif
@yield('content')
@include('layouts.user.rightbar')
@include('layouts.user.footer')