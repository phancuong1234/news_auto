<div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
    {!! Form::open(['method' => 'PATCH', 'route' => ['profile.update', Auth::user()->id], 'id' => 'changeInfo']) !!}
    <div class="row">
        <div class="col-sm-3 col-md-2 col-5">
            <label style="font-weight:bold;">Họ tên</label>
        </div>
        <div class="col-md-8 col-6">
            {!! Form::text('fullname', Auth::user()->fullname, ['class' => 'form-control']) !!}
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-sm-3 col-md-2 col-5">
            <label style="font-weight:bold;">Email</label>
        </div>
        <div class="col-md-8 col-6">
            {!! Form::email('email', Auth::user()->email, ['class' => 'form-control']) !!}
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-sm-3 col-md-2 col-5">
            <label style="font-weight:bold;">Ngày sinh</label>
        </div>
        <div class="col-md-8 col-6">
            {!! Form::text('birth_date', Auth::user()->birth_date, ['class' => 'datepicker form-control', 'autocomplete' => 'off']) !!}
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-sm-3 col-md-2 col-5">
            <label style="font-weight:bold;">Số điện thoại</label>
        </div>
        <div class="col-md-8 col-6">
            {!! Form::text('phone', Auth::user()->phone, ['class' => 'form-control']) !!}
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-sm-3 col-md-2 col-5">
            <label style="font-weight:bold;">Địa chỉ</label>
        </div>
        <div class="col-md-8 col-6">
            {!! Form::text('address', Auth::user()->address, ['class' => 'form-control']) !!}
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-sm-3 col-md-2 col-5">
            <label style="font-weight:bold;">Giới tính</label>
        </div>
        <div class="col-md-8 col-6">
            {!! Form::select('gender', [config('setting.gender.male') => 'Nam', config('setting.gender.female') => 'Nữ'], Auth::user()->gender , ['class' => 'form-control']) !!}
        </div>
    </div>
    <hr />
    {!! Form::close() !!}
</div>
