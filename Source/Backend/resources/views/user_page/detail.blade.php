@extends('layouts.user.master')
@section('content')
    <div class="main__content col-xl-8  border-right" id="main-content">
      <div class="row">
        <input type="hidden" value="{{$detail->id}}" id="id_news" >
        <h1 class="main__titile col-12 mb-2"o>{{$detail->title}}</h1>
        <div class="main__content__body text-justify p-3">
          {!! $html = html_entity_decode($detail->content) !!}
          <p class="text-right font-weight-bold" >{{$detail->username}}</p>
        </div>
        <div class="col-md-12">
          <p class = "text-left font-weight-bold" >Bình Luận</p>
          <div class="show-cmt" id="show-cmt">
            @foreach($listCmt as $key => $value)
            <div class="row comment">
              <div class = "img-cmt">
                  <img style="width: 110px;height: 110px" src="{{ asset('images/avatars/'.$value->image) }}" />
              </div>
              <div class = "content-cmt" id="content-cmt">
                <input type="hidden" name="id_cmt" value="{{ $value->id }}" id="id_cmt" >
                <p class = "text-left font-weight-bold" >{{ $value->username }}</p>
                <p class = "text-left font-weight-bold" >{{ $value->content }}</p>
              </div>
            </div>
            @endforeach
          </div>
          <div id="load_more">
            <button type="button" name="load_more_button" class="btn btn-success form-control" id="load_more_button">Load More</button>
          </div>
        </div> 
        <div class="form-cmt mt-5">
          <div class = "img-cmt-new">
            @if(Auth::check())
              <img style="width: 85%;" src="{{asset('/images/avatars/'.Auth::user()->image)}}" />
            @else
              <img style="width: 100%;" src="{{ asset('/templates/admin/images/user.png') }}" />
            @endif
          </div>
          <form action="{{ route('comment.store') }}" method="POST" id="comment-form">
              @csrf
              <input type="hidden" name="id_news" value="{{$detail->id}}" id="id-art" >
              <input type="text" class="text-comment" name="content" id="text-comment" placeholder="Nhập bình luận">
              <div class="submit-cmt">
                <button type="submit" id="summit-btn" class="btn-xs btn-info submit-btn">Đăng</button>
              </div>
          </form>
        </div>
        <h5 class="carousel__title py-3 border-bottom border-success mb-4 title-detail">BÀI VIẾT CÙNG DANH MỤC</h5>
        <div class="row">
          @foreach($news_same_cate as $key)
            <div class="col-md-4">
              <a href="{{route('detail',$key->id)}}"><img class="img--full img-fluid mb-2" src="{{$key->image}}" alt="relevant-image"></a>
                <a class="media-body__title" href="{{route('detail',$key->id)}}"><p class="content__title">{{$key->title}}</p></a>
            </div>
          @endforeach
        </div>
        <small class="paginate">
            <a href="{{ $news_same_cate->previousPageUrl() }}"><i class="fas fa-circle text-black-50"></i></a>
            <a href="#"><i class="fas fa-circle mx-2"></i></a>
            <a href="{{ $news_same_cate->nextPageUrl() }}"><i class="fas fa-circle text-black-50"></i></a>
        </small>
      </div>
    </div><!-- end content -->
@endsection
