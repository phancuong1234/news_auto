@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách bài viết</h4>
                    @include('common.error')
                    <div>
                        <input class="form-control search-field search" id="search" type="text" placeholder="Tìm kiếm..." aria-label="Search" onkeyup="liveSearch('news-pending')">
                        <div class="btn-next-prev">
                            <span class="text-total-news">{{ ($listNews->count() > 0) ? $listNews->firstItem().' - '.$listNews->lastItem().' trong tổng số '.$listNews->total().' tin tức':"" }} </span>
                            <a href="{{ $listNews->previousPageUrl() }}" class="previous round {{ ($listNews->currentPage() > 1)?'btn-active':'' }}">&#8249;</a>
                            <input class="text-paginate" type="text" id="text-paginate-news"/>
                            <a href="{{ $listNews->nextPageUrl() }}" class="next round {{ ($listNews->currentPage() != $listNews->total())?'btn-active':'' }}">&#8250;</a>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Tiêu đề
                            </th>
                            <th>
                                Mô tả ngắn
                            </th>
                            <th>
                                Tình Trạng
                            </th>
                            <th>
                                Hành Động
                            </th>
                        </tr>
                        </thead>
                        @if($listNews->count() <= 0)
                            <tbody>
                            <td colspan="5" class="nothing">
                                không có thông tin gì ...
                            </td>
                            </tbody>
                        @else
                            <tbody id="news">
                            @foreach($listNews as $listNews => $news)
                                <tr>
                                    <td>
                                        {{ $news->id }}
                                    </td>
                                    <td>
                                        <a href="{{ route('pending.news.preview', [$news->id, config('setting.type_preview.preview_of_news_pending')]) }}">
                                            {{ $news->title }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $news->short_description }}
                                    </td>
                                    <td>
                                        <label class="badge {{ ($news->is_active == config('setting.is_active.pending'))?"badge-gradient-warning":"badge-gradient-danger" }}">
                                            {{ ($news->is_active == config('setting.is_active.pending'))?"Pending":"Reject" }}
                                        </label>
                                    </td>
                                    <td>
                                        @can("editor")
                                            <a href="javascript:void(0)" style="margin-left: 10%" onclick="submitFormAcceptNews('accept-news' + {{$news->id}})">
                                                <i class="mdi mdi-check-circle"></i>
                                            </a>
                                            <a href="javascript:void(0)" style="margin-left: 10%" onclick="submitFormDeleteHard('delete-news' + {{$news->id}})">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                            {!! Form::open(['method' => 'PATCH', 'route' => ['pending.accept.news',$news->id], 'id'=>'accept-news'.$news->id]) !!}
                                            {!! Form::close() !!}
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['news.destroy',$news->id], 'id'=>'delete-news'.$news->id]) !!}
                                            {!! Form::close() !!} 
                                        @endcan
                                        @cannot("editor")
                                            No action
                                        @endcannot
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
