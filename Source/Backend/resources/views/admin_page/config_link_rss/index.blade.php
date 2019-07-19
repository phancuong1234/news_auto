@extends('layouts.admin.master')
@section('title')
    Quản lý Cấu Hình RSS
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Quản lý Cấu Hình RSS</h4>
                    @include('common.error')
                    <div>
                        <a href="{{ route('config.create') }}" class="btn btn-gradient-info btn-sm">
                            <i class="mdi mdi-library-plus"></i>
                            Thêm
                        </a>
                        <input class="form-control search-field search" id="search" type="text" placeholder="Tìm kiếm..." aria-label="Search" onkeyup="liveSearch('config_rss')">
                        @if($listConfig->count() > 0)
                            <input type="hidden" id="total_page" value="{{ $listConfig->lastPage() }}"/>
                            <div class="btn-next-prev">
                                <span class="text-total-news">{{ ($listConfig->count() > 0) ? $listConfig->firstItem().' - '.$listConfig->lastItem().' trong tổng số '.$listConfig->total().' cấu hình':"" }} </span>
                                <a href="{{ ($listConfig->currentPage() > 1) ? $listConfig->previousPageUrl():'javascript:void(0)' }}" class="previous round {{ ($listConfig->currentPage() > 1)?'btn-active':'' }}">&#8249;</a>
                                <input class="text-paginate" type="number" id="text-paginate-comment" min="1" max="{{ $listConfig->lastPage() }}"/>
                                <a href="{{ ($listConfig->currentPage() != $listConfig->lastPage()) ? $listConfig->nextPageUrl():'javascript:void(0)' }}" class="next round {{ ($listConfig->currentPage() != $listConfig->lastPage())?'btn-active':'' }}">&#8250;</a>
                            </div>
                        @endif
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Tên Trang
                            </th>
                            <th>
                                Tên Danh Mục
                            </th>
                            <th>
                                Trạng thái
                            </th>
                            <th>
                                Hành Động
                            </th>
                        </tr>
                        </thead>
                        @if($listConfig->count() <= 0)
                            <tbody>
                            <td colspan="6" class="nothing">
                                không có thông tin gì ...
                            </td>
                            </tbody>
                        @else
                            <tbody id="comment">
                            @foreach($listConfig as $key => $value)
                                <tr>
                                    <td>
                                        {{ $value->id }}
                                    </td>
                                    <td>
                                        {{ $value->name_page }}
                                    </td>
                                    <td>
                                        {{ $value->name_cate }}
                                    </td>
                                    <td>
                                        <label class="badge {{ ($value->is_active == config('setting.is_active.active'))?"badge-gradient-success":"badge-gradient-danger" }}" id="event-lock-active">
                                            {{ ($value->is_active == config('setting.is_active.active'))?"Active":"Lock" }}
                                        </label>
                                    </td>
                                    <td>
                                        <a href="{{ route('config.show', $value->id) }}">
                                            <i class="mdi mdi-tooltip-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" style="margin-left: 10%" onclick="submitFormDeleteHard('delete-comment' + {{ $value->id }})">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['config.destroy',$value->id], 'id'=>'delete-comment'.$value->id]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
