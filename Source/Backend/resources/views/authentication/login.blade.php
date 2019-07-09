<head lang="vi">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng nhập</title>
    <!-- plugins:css -->
    {{ Html::style(asset('/templates/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css')) }}
    {{ Html::style(asset('/templates/admin/vendors/css/vendor.bundle.base.css')) }}
    {{ Html::style(asset('/templates/admin/css/style.css')) }}
    {{ Html::style(asset('/templates/admin/images/favicon.png')) }}
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo center-align">
                            <img src="{{ asset('/templates/images/login.png') }}">
                        </div>
                        @include('common.error')
                        <h4>Xin chào! Bắt đầu ngay nào.</h4>
                        <h6 class="font-weight-light">Đăng nhập để tiếp tục.</h6>
                        {!! Form::open(['method' => 'POST','id'=>'login', 'route' => 'login.store', 'class' => 'pt-3']) !!}
                            <div class="form-group">
                                {!! Form::text('username', '', ['class'=>'form-control form-control-lg', 'placeholder'=>'Username', 'id' => 'username', 'autocomplete' => 'off']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::password('password', ['class'=>'form-control form-control-lg', 'placeholder'=>'Password', 'id' => 'password', 'autocomplete' => 'on']) !!}
                            </div>
                            <div class="mt-3">
                                {!! Form::submit('Đăng nhập',['class' => 'btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn', 'name'=>'login']) !!}
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input">
                                        Giữ trạng thái đăng nhập
                                    </label>
                                </div>
                                <a href="#" class="auth-link text-black">Quên mật khẩu ?</a>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Bạn chưa có tài khoản ? <a href="{{route('register.index')}}" class="text-primary">Đăng kí</a>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->

{{ Html::script(asset('/templates/admin/vendors/js/vendor.bundle.base.js')) }}
{{ Html::script(asset('/templates/admin/vendors/js/vendor.bundle.addons.js')) }}
{{ Html::script(asset('messages.js')) }}
{{ Html::script(asset('/templates/admin/js/validate.js')) }}
{{ Html::script(asset('/templates/admin/js/jquery.validate.min.js')) }}
{{ Html::script(asset('/templates/admin/js/off-canvas.js')) }}
{{ Html::script(asset('/templates/admin/js/misc.js')) }}
<!-- endinject -->
</body>

</html>
