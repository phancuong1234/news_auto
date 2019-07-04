@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Quản lý RSS</h4>
                    @include('common.error')
                    <p class="card-description">
                        Chỉnh sửa tin tức
                    </p>
                    {!! Form::open(['method' => 'PATCH', 'route' => ['rss.update', $detailRSS->id], 'class' => 'forms-sample', 'id' => 'edit-rss']) !!}
                    <div class="form-group">
                        {!! Form::label('name_page', 'Tên web') !!}
                        {!! Form::text('name_page', $detailRSS->name_page, ['class' => 'form-control', 'id' => 'name_page', 'placeholder' => 'Tên website đã thu thập dữ liệu']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('link_page', 'Link web') !!}
                        {!! Form::text('link_page', $detailRSS->link_page, ['class' => 'form-control', 'id' => 'link_page', 'placeholder' => 'Link website đã thu thập dữ liệu', 'disabled' => 'true']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('title', 'Tiêu đề') !!}
                        {!! Form::text('title', $detailRSS->title, ['id' => 'title', 'class' => 'form-control', 'placeholder' => 'Tiêu đề của tin tức']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('category', 'Danh mục') !!}
                        {!! Form::text('category', (isset($detailRSS->sub_category))?$detailRSS->category.' - '.$detailRSS->sub_category:$detailRSS->category, ['id' => 'category', 'class' => 'form-control', 'placeholder' => 'Danh mục của tin tức', 'disabled' => 'true']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Mô tả ngắn') !!}
                        {!! Form::text('description', $detailRSS->description, ['class' => 'form-control', 'placeholder' => 'Mô tả ngắn của tin tức']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('content', 'Ngày bắt đầu - ngày hết hạn') !!}
                        <div>
                            {!! Form::text('date_start', $detailRSS->date_start, ['class' => 'datepicker form-control col-4 inline-block', 'autocomplete' => 'off']) !!}
                            -
                            {!! Form::text('date_end', $detailRSS->date_end, ['class' => 'datepicker form-control col-4 inline-block', 'autocomplete' => 'off']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('active', 'Tình trạng') !!}
                        {!! Form::select('active', [config('setting.is_active.active') => 'Hoạt động', config('setting.is_active.lock') => 'Khóa'], $detailRSS->active, ['id' => 'active', 'class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit("Sửa", ['class' => 'btn btn-gradient-primary mr-2 btn-sm', 'id' => 'btnEditRSS']) !!}
                    <a href="{{ route('rss.index') }}" class="btn btn-light btn-sm">Hủy</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection
