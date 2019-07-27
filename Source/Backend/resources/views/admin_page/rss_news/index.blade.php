@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách tin tức được thu thập từ rss</h4>
                    @include('common.error')
                    <div>
                        <a href="{{ route('index.crawl.xml') }}" class="btn btn-gradient-info btn-sm">
                            <i class="mdi mdi-library-plus"></i>
                            Thêm
                        </a>
                        <input class="form-control search-field search" id="search" type="text" placeholder="Tìm kiếm..." aria-label="Search" onkeyup="liveSearch(event,'rss')">
                        @if($listRSS->count() > 0)
                            <input type="hidden" id="total_page" value="{{ $listRSS->lastPage() }}"/>
                            <div class="btn-next-prev">
                                <span class="text-total-news">{{ ($listRSS->count() > 0) ? $listRSS->firstItem().' - '.$listRSS->lastItem().' trong tổng số '.$listRSS->total().' tin tức rss':"" }} </span>
                                <a href="{{ ($listRSS->currentPage() > 1) ? $listRSS->previousPageUrl():'javascript:void(0)' }}" class="previous round {{ ($listRSS->currentPage() > 1)?'btn-active':'' }}">&#8249;</a>
                                <input class="text-paginate" type="number" id="text-paginate-rss" min="1" max="{{ $listRSS->lastPage() }}"/>
                                <a href="{{ ($listRSS->currentPage() != $listRSS->lastPage()) ? $listRSS->nextPageUrl():'javascript:void(0)' }}" class="next round {{ ($listRSS->currentPage() != $listRSS->lastPage())?'btn-active':'' }}">&#8250;</a>
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
                                    Tên Web
                                </th>
                                <th>
                                    Danh mục
                                </th>
                                <th>
                                    Tiêu đề
                                </th>
                                <th>
                                    Tình Trạng
                                </th>
                                <th>
                                    Hành Động
                                </th>
                            </tr>
                        </thead>
                        @if($listRSS->count() <= 0)
                            <tbody>
                                <td colspan="6" class="nothing">
                                    không có thông tin gì ...
                                </td>
                            </tbody>
                        @else
                            <tbody id="rss">
                            @foreach($listRSS as $listRSS => $news)
                                <tr>
                                    <td>
                                        {{ $news->id }}
                                    </td>
                                    <td>
                                        {{ $news->name_page }}
                                    </td>
                                    <td>
                                        {{ (isset($news->sub_category))?$news->category.' - '.$news->sub_category:$news->category }}
                                    </td>
                                    <td>
                                       {{ $news->title }}
                                    </td>
                                    <td>
                                        @if($news->active == config('setting.is_active.active'))
                                            <label class="badge badge-gradient-success">Active</label>
                                        @else
                                            <label class="badge badge-gradient-danger">Lock</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('rss.show', $news->id) }}">
                                            <i class="mdi mdi-tooltip-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" style="margin-left: 10%" onclick="submitFormDeleteHard('delete-news' + {{$news->id}})">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['rss.destroy',$news->id], 'id'=>'delete-news'.$news->id]) !!}
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
