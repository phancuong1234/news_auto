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
                    @include('common.error')
                    <h4 class="card-title">Cập nhật Người Dùng</h4>
                    @foreach($oldModUser as $oldModUser)
                    {!!Form::open(['method'=>'PATCH','id'=>'edit-user','route'=>['users.update',$oldModUser->id],'files'=>true]) !!}             
                        <div class="form-group">
                            {!! Form::label('username', 'UserName') !!}  
                            {!! Form::text('username', $oldModUser->username
                            , ['class'=>'form-control', 'placeholder'=>'UserName']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fullname', 'FullName') !!} 
                            {!! Form::text('fullname', $oldModUser->fullname , ['class'=>'form-control', 'placeholder'=>'FullName']) !!}
                        </div>
                        <div class="form-group">
                            <a type="button" class="btn btn-primary btn-sm" id="show-change-pass">
                                Change Password
                            </a>
                        </div>
                        <div class="form-group" id="showpass" style="display:none">
                            <button type="button" class="close mb-3" id="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {!! Form::label('password', 'Password') !!} 
                            {!! Form::input('password','password',$oldModUser->password, ['class'=>'form-control', 'placeholder'=>'New Password']) !!}
                        </div>
                        <div class="form-group" id="showrepass" style="display:none">
                            {!! Form::label('repass', 'Re-Password') !!} 
                            {!! Form::input('password','repass',$oldModUser->password, ['class'=>'form-control', 'placeholder'=>'Re-Password']) !!}
                        </div>
                        <div class="form-group mt-2">
                            {!! Form::label('phone', 'Phone') !!}
                            {!! Form::text('phone',$oldModUser->phone, ['class'=>'form-control', 'placeholder'=>'Phone']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('gender', 'Gender') !!}
                            {!! Form::select('gender', ['male' => 'Male', 'female' => 'Female'],$oldModUser->gender,['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('active', 'Active') !!}
                            {!! Form::select('active', ['0' => 'Lock', '1' => 'Active'],$oldModUser->active,['class' => 'form-control']) !!}
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
                            {!! Form::text('address', $oldModUser->address , ['class'=>'form-control', 'placeholder'=>'Location']) !!}
                            
                        </div>
                        {!! Form::submit('submit',['class' => 'btn btn-gradient-primary mr-2']) !!}
                        <a class="btn btn-light" href = "{{route('ModManager')}}" >cancel</a>
                    {!! Form::close() !!}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
