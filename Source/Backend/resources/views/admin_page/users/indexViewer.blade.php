@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
@include('common.error')
<div class="row">
    <h2 class="ml-3">Quản lý người xem</h2>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @include('common.error')
                    <div>
                        <input class="form-control search-field search" id="search" type="text" placeholder="Tìm kiếm..." aria-label="Search" onkeyup="liveSearch(event,'viewer')">
                    </div>
                    <h4 class="card-title">Người xem</h4>
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
                            <tbody id="viewer">
                                @foreach($viewer as $key => $value)
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
                                        <a href="javascript:void(0)" style="float: left;" onclick="submitFormDeleteHard('delete-viewer' + {{$value->id}})">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy',$value->id], 'id'=>'delete-viewer'.$value->id]) !!}
                                            {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($viewer->count() > 0)
                    <input type="hidden" id="total_page" value="{{ $viewer->lastPage() }}"/>
                    <div class="btn-next-prev">
                        <span class="text-total-news">{{ ($viewer->count() > 0) ? $viewer->firstItem().' - '.$viewer->lastItem().' trong tổng số '.$viewer->total().' người dùng':"" }} </span>
                        <a href="{{ ($viewer->currentPage() > 1) ? $viewer->previousPageUrl():'javascript:void(0)' }}" class="previous round {{ ($viewer->currentPage() > 1)?'btn-active':'' }}">&#8249;</a>
                        <input class="text-paginate" type="number" id="text-paginate-viewer" min="1" max="{{ $viewer->lastPage() }}"/>
                        <a href="{{ ($viewer->currentPage() != $viewer->lastPage()) ? $viewer->nextPageUrl():'javascript:void(0)' }}" class="next round {{ ($viewer->currentPage() != $viewer->lastPage())?'btn-active':'' }}">&#8250;</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
