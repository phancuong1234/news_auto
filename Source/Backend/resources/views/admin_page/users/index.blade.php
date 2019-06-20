@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
@include('common.error')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Admin</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Tên
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Trạng Thái
                                    </th>
                                    <th>
                                        Cập nhật lần cuối
                                    </th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach($userAdmin as $userAdmin)
                                    <tr>
                                        <td>
                                            {{ $userAdmin->id }}
                                        </td>
                                        <td>
                                            {{ $userAdmin->username }}
                                        </td>
                                        <td>
                                            {{ $userAdmin->email }}
                                        </td>
                                        <td>
                                            @if($userAdmin->active == 1)
                                                <label class="badge badge-gradient-success">Active</label>
                                            @else
                                                <label class="badge badge-gradient-danger">Lock</label>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $userAdmin->updated_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh Sách Mod </h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Tên
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Trạng Thái
                                    </th>
                                    <th>
                                        Cập Nhật Lần Cuối
                                    </th>
                                    <th>
                                        Hành Động
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userMod as $userMod)
                                <tr>
                                    <td>
                                        {{$userMod->id}}
                                    </td>
                                    <td>
                                        {{$userMod->username}}
                                    </td>
                                    <td>
                                        {{$userMod->email}}
                                    </td>
                                    <td>
                                        @if($userMod->active == 1)
                                            <label class="badge badge-gradient-success">Active</label>
                                        @else
                                            <label class="badge badge-gradient-danger">Lock</label>
                                        @endif
                                    </td>
                                    <td>
                                        {{$userMod->updated_at}}
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" style="float: left;" onclick="submitFormDeleteHard('delete-category' + {{$userMod->id}})">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy',$userMod->id], 'id'=>'delete-category'.$userMod->id]) !!}
                                        {!! Form::close() !!}
                                        <a href="{{ route('users.edit',$userMod->id) }}">
                                            <i class="mdi mdi-tooltip-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a style="float: right;" href="{{ route('users.create') }}"  class="btn btn-gradient-info btn-fw">Thêm Mod-User </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Người Dùng</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Tên
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Trạng Thái
                                    </th>
                                    <th>
                                        Cập nhật Lần Cuối
                                    </th>
                                    <th>
                                        Hành Động
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($viewer as $viewer)
                                <tr>
                                    <td>
                                        {{$viewer->id}}
                                    </td>
                                    <td>
                                        {{$viewer->username}}
                                    </td>
                                    <td>
                                        {{$viewer->email}}
                                    </td>
                                    <td>
                                        @if($viewer->active == 1)
                                            <label class="badge badge-gradient-success">Active</label>
                                        @else
                                            <label class="badge badge-gradient-danger">Lock</label>
                                        @endif
                                    </td>
                                    <td>
                                        {{$viewer->updated_at}}
                                    </td>                                    
                                    <td>
                                        <a href="{{route('users.destroy',$viewer->id)}}">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
