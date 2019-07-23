@extends('layouts.user.master')
@section('content')
  <div class="main">
    <div class="container mt-4 mb-5">
      <div class="row">
        <div class="main__content col-xl-8  border-right" id="main-content">
            <div class="content__card row mb-4">
                    <a  class="card__image img-full col-md-6 mb-2 mb-md-0" href="{{route('detail',$main_news_cate['id'])}}"><img class="img-main" src="{{$main_news_cate['image']}}" alt="image-9"></a>
                    <div class="card__body col-md-6">
                    <a class="media-body__title" href="{{route('detail',$main_news_cate['id'])}}"><h4 class="card__title mb-3">{{$main_news_cate['title']}}</h4></a>
                    <p class="card__desc text-justify">{{$main_news_cate['short_description']}}</p>
            </div>
        </div>
        <div class="row">
            @foreach($news_cate as $key)
            <div class="media col-md-6 mb-3">
              <a href="{{route('detail',$key->id)}}"><img class="mr-3" src="{{$key->image}}" alt="image-4"></a>
              <div class="media-body">
                <a href="{{route('detail',$key->id)}}" class="media-body__title"><h5 class="mt-0 content__title">{{$key->title}}</h5></a>
              </div>
            </div>
            @endforeach
          </div>
          <div class="container mt-5 pt-5 pl-0 border-top border-success">
            @foreach($all_news_cate as $key)
            <div class="row media mb-3">
                <a class="cate__img col-12 col-md-4 w100" href="{{route('detail',$key->id)}}"><img class="img-news"  src="{{ $key->image }}" alt="category1"></a>
                <div class="media-body col-12 col-12 col-md-8">
                    <a href="{{route('detail',$key->id)}}" class="media-body__title"><h5 class="cate__title my-0">{{ $key->title }}</h5></a>
                    <small class="cate__time text-black-50 mb-2"><i class="far fa-clock mr-2"></i>15/11/2016</small>
                    <p class="cate__desc text-justify">{{ $key->short_description }}</p>
                </div>
            </div>
            @endforeach
            <div class="row mt-5" style="margin-left: 16%" >{{$all_news_cate->links()}}
						</div>	
          </div>
        </div> <!-- end content -->
@endsection
