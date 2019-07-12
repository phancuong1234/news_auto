@extends('layouts.user.master')
@section('content')
  @foreach($detail as $key)
    <div class="main__content col-xl-8  border-right" id="main-content">
    <div class="row">

            <h1 class="main__titile col-12 mb-2"o>{{$key->title}}</h1>
            <div class="main__content__body text-justify p-3">
              {!! $html = html_entity_decode($key->content) !!}
            <p class="text-right font-weight-bold" >Admin</p>
          </div>
          <div class="col-md-3">
          <img class="img-fluid mb-2" src="{{asset('templates/user/images/comment.jpg')}}" alt="Comment facebook">
          </div>
          <div class="carousel">
            <h5 class="carousel__title py-3 border-bottom border-success mb-4">BÀI VIẾT CÙNG DANH MỤC</h5>
            <div class="row">
              @foreach($news_same_cate as $key)
                <div class="col-md-4">
                  <a href="{{route('detail',$key->id)}}"><img class="img--full img-fluid mb-2" src="{{$key->image}}" alt="relevant-image"></a>
                    <a class="media-body__title" href="{{route('detail',$key->id)}}"><p class="content__title">{{$key->title}}</p></a>
                </div>
              @endforeach
            </div>
            <small class="d-flex justify-content-center ">
                <a href="{{ $news_same_cate->previousPageUrl() }}"><i class="fas fa-circle text-black-50"></i></a>
                <a href="#"><i class="fas fa-circle mx-2"></i></a>
                <a href="{{ $news_same_cate->nextPageUrl() }}"><i class="fas fa-circle text-black-50"></i></a>
            </small>
          </div>
          </div>
        </div> <!-- end content -->
      
  @endforeach
@endsection
