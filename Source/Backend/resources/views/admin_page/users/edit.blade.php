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
                    <h4 class="card-title">Cập nhật Người Dùng</h4>
                    @foreach($oldModUser as $oldModUser)
                    {!!Form::open(['method'=>'PATCH','route'=>['users.update',$oldModUser->id],'files'=>true]) !!}
                    
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
                            {!! Form::label('email', 'Email') !!} 
                            {!! Form::email('email', $oldModUser->email , ['class'=>'form-control', 'placeholder'=>'Email']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Password') !!} 
                            {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('phone', 'Phone') !!}
                            {!! Form::text('phone',$oldModUser->phone, ['class'=>'form-control', 'placeholder'=>'Phone']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('gender', 'Gender') !!}
                            {!! Form::select('gender', ['male' => 'Male', 'female' => 'Female'],$oldModUser->gender,['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('image', 'Image') !!}
                            <div class="input-group col-xs-12">
                                <span class="input-group-append">
                                    {!! Form::file('image', ['class'=>'file-upload-browse btn btn-gradient-primary','id'=>'file',]) !!}
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('address', 'Address') !!}
                            {!! Form::text('address', $oldModUser->address , ['class'=>'form-control', 'placeholder'=>'Location']) !!}
                        </div>
                       
                        {!! Form::submit('submit',['class' => 'btn btn-gradient-primary mr-2']) !!}
                        {!! Form::button('cancel',['class' => 'btn btn-light']) !!}
                    {!! Form::close() !!}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
