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
                    <h4 class="card-title">Thêm người dùng mới</h4>
                    {!! Form::open(['method' => 'POST','id'=>'add-user', 'route' => 'users.store','files'=>true]) !!}
                        <div class="form-group">
                            {!! Form::label('username', 'UserName') !!}  
                            {!!Form::text('username','',['class'=>'form-control', 'placeholder'=>'UserName']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fullname', 'FullName') !!} 
                            {!!Form::text('fullname','',['id'=>'fullname','class'=>'form-control', 'placeholder'=>'FullName']) !!} 
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
                            {!! Form::label('repass', 'Re-Password') !!}
                            {!! Form::password('repass', ['class'=>'form-control', 'placeholder'=>'Re-Password']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('role', 'Role') !!}
                            {!! Form::select('id_role', ['' => 'Select role'] + ['2' => 'Mod','3'=>'View User'], null, ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::submit('Submit',['class' => 'btn btn-gradient-primary mr-2','name'=>'submit']) !!}
                        <a class="btn btn-light" href = "{{route('ModManager')}}" >cancel</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
