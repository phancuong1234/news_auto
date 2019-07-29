@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
@include('common.error')
<div class="row">
    <h2 class="ml-3">Quản Lý Mod</h2>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @include('common.error')
                    <div>
                        <input class="form-control search-field search" id="search" type="text" placeholder="Tìm kiếm..." aria-label="Search" onkeyup="liveSearch(event,'users')">
                    </div>
                    <h4 class="card-title float-left">Danh Sách Mod </h4>
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
                            <tbody id="users">
                                @foreach($userMod as $key => $value)
                                    <tr>
                                        <td>
                                            {{$value->id}}
                                        </td>
                                        <td>
                                            {{$value->username}}
                                        </td>
                                        <td>
                                            {{$value->email}}
                                        </td>
                                        <td>
                                            @if($value->active == 1)
                                                <label class="badge badge-gradient-success">Active</label>
                                            @else
                                                <label class="badge badge-gradient-danger">Lock</label>
                                            @endif
                                        </td>
                                        <td>
                                            {{$value->updated_at}}
                                        </td>
                                        <td>
                                            @cannot('mod')
                                                <a href="javascript:void(0)" style="float: left;" onclick="submitFormDeleteHard('delete-category' + {{$value->id}})">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy',$value->id], 'id'=>'delete-category'.$value->id]) !!}
                                                {!! Form::close() !!}
                                                <a href="{{ route('users.edit',$value->id) }}">
                                                    <i class="mdi mdi-tooltip-edit"></i>
                                                </a>
                                            @endcannot
                                            @can("mod")
                                                No action
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($userMod->count() > 0)
                    <input type="hidden" id="total_page" value="{{ $userMod->lastPage() }}"/>
                    <div class="btn-next-prev">
                        <span class="text-total-news">{{ ($userMod->count() > 0) ? $userMod->firstItem().' - '.$userMod->lastItem().' trong tổng số '.$userMod->total().' Mod':"" }} </span>
                        <a href="{{ ($userMod->currentPage() > 1) ? $userMod->previousPageUrl():'javascript:void(0)' }}" class="previous round {{ ($userMod->currentPage() > 1)?'btn-active':'' }}">&#8249;</a>
                        <input class="text-paginate" type="number" id="text-paginate-user" min="1" max="{{ $userMod->lastPage() }}"/>
                        <a href="{{ ($userMod->currentPage() != $userMod->lastPage()) ? $userMod->nextPageUrl():'javascript:void(0)' }}" class="next round {{ ($userMod->currentPage() != $userMod->lastPage())?'btn-active':'' }}">&#8250;</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
