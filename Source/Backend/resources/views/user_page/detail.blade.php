@extends('layouts.user.master') @section('content')
    <div class="main__content col-xl-8  border-right" id="main-content">
        <div class="row">
            <input type="hidden" value="{{$detail->id}}" id="id_news">
            <h1 class="main__titile col-12 mb-2" o>{{$detail->title}}</h1>
            <div class="w-100 ml-3">
                <small class="cate__time text-black-50 mb-2">
                    <i class="far fa-clock mr-2"></i>
                    {{ date_format($detail->created_at,"H:i d-m-Y") }}
                </small>
                <small class="cate__time text-black-50 mb-2 ml-2">
                    <i class="far fa-eye mr-2"></i>
                    {{ $detail->number_view }}
                </small>
            </div>
            <div class="main__content__body text-justify p-3">
                {!! $html = html_entity_decode($detail->content) !!}
                <p class="text-right font-weight-bold">{{$detail->username}}</p>
            </div>
            <div class="col-md-12">
                <p class="text-left font-weight-bold">Bình Luận</p>
                <div class="show-cmt" id="show-cmt">
                    @foreach($listCmt as $key => $value)
                        <div class="row comment">
                            <div class="img-cmt">
                                <img style="width: 110px;height: 110px" src="{{ (trim(auth()->user()->image) == '' || auth()->user()->image == 'no-image.png') ? asset('/templates/images/no-image.png'):asset('/images/avatars/'.Auth::user()->image) }}" />
                            </div>
                            <div class="content-cmt" id="content-cmt">
                                <input type="hidden" name="id_cmt" value="{{ $value->id }}" id="id_cmt">
                                <p class="text-left font-weight-bold">{{ $value->username }}</p>
                                <p class="text-left font-weight-bold">{{ $value->content }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if($listCmt->count() == 5)
                    <div id="load_more">
                        <button type="button" name="load_more_button" class="btn btn-success form-control" id="load_more_button">Xem thêm...</button>
                    </div>
                @endif
            </div>
            <div class="form-cmt mt-5">
                <div class="img-cmt-new">
                    @if(Auth::check())
                        <img style="width: 85%;" src="{{ (trim(auth()->user()->image) == '' || auth()->user()->image == 'no-image.png') ? asset('/templates/images/no-image.png'):asset('/images/avatars/'.Auth::user()->image) }}" /> @else
                        <img style="width: 100%;" src="{{ asset('/templates/images/no-image.png') }}" /> @endif
                </div>
                <form action="{{ route('comment.store') }}" method="POST" id="comment-form">
                    @csrf
                    <input type="hidden" name="id_news" value="{{$detail->id}}" id="id-art">
                    <input type="text" class="text-comment" name="content" id="text-comment" placeholder="Nhập bình luận">
                    <div class="submit-cmt">
                        <button type="submit" id="summit-btn" class="btn-xs btn-info submit-btn">Đăng</button>
                    </div>
                </form>
            </div>
            <h5 class="carousel__title py-3 border-bottom border-success mb-4 title-detail">BÀI VIẾT CÙNG DANH MỤC</h5>
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
                <a class="carousel-control-prev" style="width: 10%;" href="#multi-item-example" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" style="width: 10%;" href="#multi-item-example" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <ol class="carousel-indicators">
                    <li data-target="#multi-item-example" class="carousel-btn" data-slide-to="0" class="active"></li>
                    <li data-target="#multi-item-example" class="carousel-btn" data-slide-to="1"></li>
                    <li data-target="#multi-item-example" class="carousel-btn" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" style="width: 80%;margin: auto;" role="listbox">
                    @foreach($arrNewsSameCate as $key => $value)
                    <div class="carousel-item {{ ($key == 0)?'active':'' }}">
                        <div class="row">
                            @foreach($value as $detail)
                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="card mb-2" style="border: none">
                                        <a href="{{ route('detail', [$detail->slug_cate, $detail->slug]) }}">
                                            <img class="img--full img-fluid mb-2" src="{{ (strpos($detail->image, config('setting.type_img.img_of_serve')) === 0)?asset('images/news/'.$detail->image):$detail->image }}" alt="relevant-image">
                                        </a>
                                        <a class="media-body__title" href="{{ route('detail', [$detail->slug_cate, $detail->slug]) }}">
                                            <p class="content__title">
                                                {{ $detail->title }}
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
{{--            <small class="paginate">--}}
{{--                <a href="{{ $news_same_cate->previousPageUrl() }}"><i class="fas fa-circle text-black-50"></i></a>--}}
{{--                <a href="#"><i class="fas fa-circle mx-2"></i></a>--}}
{{--                <a href="{{ $news_same_cate->nextPageUrl() }}"><i class="fas fa-circle text-black-50"></i></a>--}}
{{--            </small>--}}
        </div>
    </div>
    <!-- end content -->
@endsection
