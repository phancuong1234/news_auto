@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thêm người dùng mới</h4>
                    {!! Form::open(['method' => 'POST', 'route' => 'users.store','files'=>true]) !!}
                        <div class="form-group">
                            {!! Form::label('username', 'UserName') !!}  
                            {!! Form::text('username', '', ['class'=>'form-control', 'placeholder'=>'UserName']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fullname', 'FullName') !!} 
                            {!! Form::text('fullname', '', ['class'=>'form-control', 'placeholder'=>'FullName']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!} 
                            {!! Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'Email']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Password') !!} 
                            {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('re-pass', 'Re-Password') !!}
                            {!! Form::password('re-pass', ['class'=>'form-control', 'placeholder'=>'Re-Password']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('phone', 'Phone') !!}
                            {!! Form::text('phone','', ['class'=>'form-control', 'placeholder'=>'Phone']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('gender', 'Gender') !!}
                            {!! Form::select('gender', ['male' => 'Male', 'female' => 'Female'],'male',['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('image', 'Image') !!}
                            <div class="input-group col-xs-12">
                                <span class="input-group-append">
                                    {!! Form::file('image', ['class'=>'file-upload-browse btn btn-gradient-primary','id'=>'file']) !!}
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('address', 'Address') !!}
                            {!! Form::text('address', '', ['class'=>'form-control', 'placeholder'=>'Location']) !!}
                        </div>
                        
                        {!! Form::submit('Submit',['class' => 'btn btn-gradient-primary mr-2','name'=>'submit']) !!}
                        {!! Form::button('Cancel',['class' => 'btn btn-light','name'=>'cancel']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
