@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách danh mục</h4>
                    @include('common.error')
                    <div>
                        <a href="{{ route('category.create') }}" class="btn btn-gradient-info btn-sm">
                            <i class="mdi mdi-library-plus"></i>
                            Thêm
                        </a>
                        <input class="form-control search-field search" id="search" type="text" placeholder="Tìm kiếm..." aria-label="Search" onkeyup="liveSearch()">
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="15%">
                                    ID
                                </th>
                                <th width="20%">
                                    Tên danh mục
                                </th>
                                <th width="15%">
                                    Trạng thái
                                </th>
                                <th width="35%">
                                    URL
                                </th>
                                <th width="15%">
                                    Hành Động
                                </th>
                            </tr>
                        </thead>
                        @if($listCategories->count() <= 0)
                            <tbody>
                                <td colspan="5" class="nothing">
                                    không có thông tin gì ...
                                </td>
                            </tbody>
                        @else
                            <tbody id="category">
                            @foreach($listCategories as $value => $cate)
                                <tr>
                                    <td>
                                        {{ $cate->id }}
                                    </td>
                                    <td>
                                        {{ $cate->name_category }}
                                    </td>
                                    <td>
                                        @if($cate->is_active == 1)
                                            <label class="badge badge-gradient-success">Active</label>
                                        @else
                                            <label class="badge badge-gradient-danger">Lock</label>
                                        @endif
                                    </td>
                                    <td class="text_overfollow">
                                        {{ (isset($cate->url_cate)) ? $cate->url_cate:"Chưa cập nhật..." }}
                                    </td>
                                    <td>
                                        <a href="{{ route('category.show', $cate->id) }}">
                                            <i class="mdi mdi-tooltip-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" style="margin-left: 10%" onclick="submitFormDeleteHard('delete-category' + {{$cate->id}})">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy',$cate->id], 'id'=>'delete-category'.$cate->id]) !!}
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
