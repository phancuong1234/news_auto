@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách bình luận</h4>
                    @include('common.error')
                    <div>
                        <input class="form-control search-field search" id="search" type="text" placeholder="Tìm kiếm..." aria-label="Search" onkeyup="liveSearch(event,'comment')">
                        @if($list_comments->count() > 0)
                            <input type="hidden" id="total_page" value="{{ $list_comments->lastPage() }}"/>
                            <div class="btn-next-prev">
                                <span class="text-total-news">{{ ($list_comments->count() > 0) ? $list_comments->firstItem().' - '.$list_comments->lastItem().' trong tổng số '.$list_comments->total().' hoạt động':"" }} </span>
                                <a href="{{ ($list_comments->currentPage() > 1) ? $list_comments->previousPageUrl():'javascript:void(0)' }}" class="previous round {{ ($list_comments->currentPage() > 1)?'btn-active':'' }}">&#8249;</a>
                                <input class="text-paginate" type="number" id="text-paginate-comment" min="1" max="{{ $list_comments->lastPage() }}"/>
                                <a href="{{ ($list_comments->currentPage() != $list_comments->lastPage()) ? $list_comments->nextPageUrl():'javascript:void(0)' }}" class="next round {{ ($list_comments->currentPage() != $list_comments->lastPage())?'btn-active':'' }}">&#8250;</a>
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
                                Link tin tức
                            </th>
                            <th>
                                Tên
                            </th>
                            <th>
                                Bình luận
                            </th>
                            <th>
                                Trạng thái
                            </th>
                            <th>
                                Hành Động
                            </th>
                        </tr>
                        </thead>
                        @if($list_comments->count() <= 0)
                            <tbody>
                            <td colspan="6" class="nothing">
                                không có thông tin gì ...
                            </td>
                            </tbody>
                        @else
                            <tbody id="comment">
                            @foreach($list_comments as $value => $cmt)
                                <tr>
                                    <td>
                                        {{ $cmt->id }}
                                    </td>
                                    <td>
                                        <a href="/{{ $cmt->link }}" target="_blank">
                                            {{ $cmt->title_news }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $cmt->username }}
                                    </td>
                                    <td>
                                        {{ $cmt->content }}
                                    </td>
                                    <td>
                                        <label class="badge {{ ($cmt->is_active == config('setting.is_active.active'))?"badge-gradient-success":"badge-gradient-danger" }}" id="event-lock-active{{ $cmt->id }}" onclick="changeStatusCmt({{ $cmt->id }})">
                                            {{ ($cmt->is_active == config('setting.is_active.active'))?"Active":"Lock" }}
                                        </label>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" style="margin-left: 10%" onclick="submitFormDeleteHard('delete-comment' + {{ $cmt->id }})">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['comments.destroy',$cmt->id], 'id'=>'delete-comment'.$cmt->id]) !!}
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
