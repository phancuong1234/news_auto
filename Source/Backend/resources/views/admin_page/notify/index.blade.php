@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thông Báo</h4>
                    @include('common.error')
                    <div>
                        @if($listNotify->count() > 0)
                            <input type="hidden" id="total_page" value="{{ $listNotify->lastPage() }}"/>
                            <div class="btn-next-prev">
                                <span class="text-total-news">{{ ($listNotify->count() > 0) ? $listNotify->firstItem().' - '.$listNotify->lastItem().' trong tổng số '.$listNotify->total().' thông báo':"" }} </span>
                                <a href="{{ ($listNotify->currentPage() > 1) ? $listNotify->previousPageUrl():'javascript:void(0)' }}" class="previous round {{ ($listNotify->currentPage() > 1)?'btn-active':'' }}">&#8249;</a>
                                <input class="text-paginate" type="number" id="text-paginate-notify" min="1" max="{{ $listNotify->lastPage() }}"/>
                                <a href="{{ ($listNotify->currentPage() != $listNotify->lastPage()) ? $listNotify->nextPageUrl():'javascript:void(0)' }}" class="next round {{ ($listNotify->currentPage() != $listNotify->lastPage())?'btn-active':'' }}">&#8250;</a>
                            </div>
                        @endif
                    </div>
                    <table class="table table-striped" style="margin-top: 6%">
                        @if($listNotify->count() <= 0)
                            <tbody>
                            <td colspan="5" class="nothing">
                                không có thông tin gì ...
                            </td>
                            </tbody>
                        @else
                            <tbody id="notifications">
                            @foreach($listNotify as $key => $value)
                                <tr class="{{ ($value->read_at == null)?'unreadNoti':'readNoti' }}">
                                    <td>
                                        <a href="{{ route('pending.news.preview', $value->data['news']['id']) }}" onclick="maskAsRead('{{ $value->id }}')">1 bài viết cần được duyệt : {{ $value->data['news']['title'] }}</a>
                                    </td>
                                    <td style="float: right" title="{{  date("H:i:s d-m-Y", strtotime($value->created_at)) }}">
                                        {{ $value->created_at_format }}
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
