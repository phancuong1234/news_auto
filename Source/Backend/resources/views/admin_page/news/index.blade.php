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
                        <a href="{{ route('news.create') }}" class="btn btn-gradient-info btn-sm">
                            <i class="mdi mdi-library-plus"></i>
                            Thêm
                        </a>
                        <input class="form-control search-field search" id="search" type="text" placeholder="Tìm kiếm..." aria-label="Search" onkeyup="liveSearch('news')">
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="15%">
                                    ID
                                </th>
                                <th width="20%">
                                    Tiêu đề
                                </th>
                                <th width="35%">
                                    Mô tả ngắn
                                </th>
                                <th width="15%">
                                    Tình Trạng
                                </th>
                                <th width="15%">
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
                                        {{ $news->title }}
                                    </td>
                                    <td>
                                        {{ $news->short_description }}
                                    </td>
                                    <td>
                                        @if($news->is_active == config('setting.is_active.active'))
                                            <label class="badge badge-gradient-success">Active</label>
                                        @else
                                            <label class="badge badge-gradient-danger">Lock</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('news.show', $news->id) }}">
                                            <i class="mdi mdi-tooltip-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" style="margin-left: 10%" onclick="submitFormDeleteHard('delete-news' + {{$news->id}})">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['news.destroy',$news->id], 'id'=>'delete-news'.$news->id]) !!}
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
