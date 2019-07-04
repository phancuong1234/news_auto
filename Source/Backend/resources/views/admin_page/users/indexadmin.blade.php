@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
@include('common.error')
    <div class="row">
        <h2 class="ml-3">Quản Lý Admin</h2>
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
@endsection