<!DOCTYPE html>
<html lang="vi">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng Kí</title>
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
                        <h4>Mới ở đây?</h4>
                        <h6 class="font-weight-light">Đăng ký rất dễ dàng. Chỉ mất vài bước</h6>
                        {!! Form::open(['method' => 'POST','id'=>'register' , 'route' => 'register.store', 'class' => 'pt-3']) !!}
                        <div class="form-group">
                            {!! Form::text('username', '', ['class'=>'form-control form-control-lg', 'placeholder'=>'Tên tài khoản', 'id' => 'username', 'autocomplete' => 'off']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::email('email', '', ['class'=>'form-control form-control-lg', 'placeholder'=>'Email', 'id' => 'email', 'autocomplete' => 'off']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::password('password', ['class'=>'form-control form-control-lg', 'placeholder'=>'Mật khẩu', 'id' => 'password', 'autocomplete' => 'on']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::password('repassword', ['class'=>'form-control form-control-lg', 'placeholder'=>'Nhập lại mật khẩu', 'autocomplete' => 'on']) !!}
                        </div>
                        <div class="mb-4">
                            <div class="form-check">
                                <label class="form-check-label text-muted">
                                    {!! Form::checkbox('rule', 'dontagree', false,['class' => 'form-check-input', 'id' => 'rule']) !!}
                                    Tôi đồng ý với tất cả các Điều khoản & Điều kiện
                                </label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="javascript:void(0)" id="btn-register">Đăng Ký</a>
                        </div>
                        <div class="text-center mt-4 font-weight-light">
                            Bạn đã có tài khoản? <a href="{{route('login.index')}}" class="text-primary">Đăng nhập</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{ Html::script(asset('messages.js')) }}
{{ Html::script(asset('/templates/admin/vendors/js/vendor.bundle.base.js')) }}
{{ Html::script(asset('/templates/admin/vendors/js/vendor.bundle.addons.js')) }}
{{ Html::script(asset('/templates/admin/js/off-canvas.js')) }}
{{ Html::script(asset('/templates/admin/js/validate.js')) }}
{{ Html::script(asset('/templates/admin/js/jquery.validate.min.js')) }}
{{ Html::script(asset('/templates/admin/js/misc.js')) }}
{{ Html::script(asset('/templates/common/js/myjs.js')) }}
</body>

</html>
