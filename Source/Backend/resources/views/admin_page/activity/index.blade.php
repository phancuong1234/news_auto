@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Lịch sử hoạt động</h4>
                    @include('common.error')
                    <div>
                        <input class="form-control search-field search" id="search" type="text" placeholder="Tìm kiếm..." aria-label="Search" onkeyup="liveSearch('activities')">
                        @if($listActivities->count() > 0)
                            <input type="hidden" id="total_page" value="{{ $listActivities->lastPage() }}"/>
                            <div class="btn-next-prev">
                                <span class="text-total-news">{{ ($listActivities->count() > 0) ? $listActivities->firstItem().' - '.$listActivities->lastItem().' trong tổng số '.$listActivities->total().' hoạt động':"" }} </span>
                                <a href="{{ ($listActivities->currentPage() > 1) ? $listActivities->previousPageUrl():'javascript:void(0)' }}" class="previous round {{ ($listActivities->currentPage() > 1)?'btn-active':'' }}">&#8249;</a>
                                <input class="text-paginate" type="number" id="text-paginate-activity" min="1" max="{{ $listActivities->lastPage() }}"/>
                                <a href="{{ ($listActivities->currentPage() != $listActivities->lastPage()) ? $listActivities->nextPageUrl():'javascript:void(0)' }}" class="next round {{ ($listActivities->currentPage() != $listActivities->lastPage())?'btn-active':'' }}">&#8250;</a>
                            </div>
                        @endif
                    </div>
                    <table class="table table-striped" style="margin-top: 6%">
                        @if($listActivities->count() <= 0)
                            <tbody>
                            <td colspan="5" class="nothing">
                                không có thông tin gì ...
                            </td>
                            </tbody>
                        @else
                            <tbody id="activities">
                            @foreach($listActivities as $key => $value)
                                <tr>
                                    <td>
                                        @if ($value->type_active != config('setting.type_active.news.delete'))
                                            <a @if(isset($value->title)) href="{{ route('pending.news.preview', [$value->id_news, config('setting.type_preview.preview_of_news')]) }}" @endif>
                                                {{ (isset($value->title) ? $value->content.'. ( '.$value->title.' )' : $value->content)}}
                                            </a>
                                        @elseif($value->type_active == config('setting.type_active.news.crawl'))
                                            {{ $value->content }}
                                        @else
                                            {{ $value->content }}
                                        @endif
                                    </td>
                                    <td style="float: right">
                                        {{  date("H:i:s d-m-Y", strtotime($value->created_at)) }}
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
