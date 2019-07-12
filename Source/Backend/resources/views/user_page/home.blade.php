@extends('layouts.user.master')
@section('content')
  <div class="main__content col-xl-8 border-right" id="main-content">
    <div class="row mb-4">
      @foreach($main_new as $key)
        <div class="content__card col-xl-7"> 
          <a href="{{route('detail', $key->id)}}"><img class="image__sidebar img-fluid" src="{{ $key->image }}" alt="image-1"></a>
          <a class="media-body__title" href="{{route('detail', $key->id)}}"><h4 class="card__title my-4">{{$key->title}}</h4></a>
          <p class="card__desc text-justify">{{$key->short_description}}</p>
        </div>
      @endforeach
      <div class="content__list col-xl-5">
        @foreach($list_news as $key)
          <ul class="list-unstyled">
            <li class="media">
              <a href="{{route('detail', $key->id)}}">
                <img class="mr-3" src="{{ $key->image }}" alt="image-2">
              </a>
              <div class="media-body">
                <a class="media-body__title mt-0 mb-1" href="{{route('detail', $key->id)}}">{{ $key->title }}</a>
              </div>
            </li>
          </ul>
        @endforeach
      </div>
    </div>
    @foreach($arrNews as $key => $value)
        <div class="category mb-1">
            <div class="category__name border-bottom border-success mb-2">
              <button class="btn btn-success rounded-0"><a href="{{route('category',$value['id_cate'] )}}">{{ $value['name_category'] }}</a></button> 
            </div>
            <div class="row">
              <div class="category__content col-xl-7">
                <a class="media-body__title" href="{{ route('detail',$value[0]['id']) }}"><h5 class="content__title mb-2">{{ $value[0]['title'] }}</h5></a>
                <div class="media d-flex flex-column flex-sm-row mb-2">
                  <a href="{{ route('detail', $value[0]['id']) }}"><img class="mr-3 w100" src="{{ $value[0]['image'] }}" alt="images/image-cagetory1"></a>
                  <div class="font__desc media-body text-justify">
                      {{ $value[0]['short_description'] }}
                  </div>
                </div>
              </div>
              <div class="col-xl-5">
                <ul class="list-unstyled">
                  <li class="media">
                    <a href="{{route('detail',$value[1]['id'])}}"><img class="mr-3" src="{{ $value[1]['image'] }}" alt="image-cagetory2"></a>
                    <div class="media-body">
                      <a href="{{route('detail',$value[1]['id'])}}"><h5 class="media-body__title mt-0 mb-1">{{ $value[1]['title'] }}</h5></a>
                    </div>
                  </li>
                </ul>
                <ul class="list-unstyled">
                  <li class="media">
                    <a href="{{route('detail',$value[2]['id'])}}"><img class="mr-3" src="{{ $value[2]['image'] }}" alt="image-cagetory3"></a>
                    <div class="media-body">
                      <a href="{{route('detail',$value[2]['id'])}}"><h5 class="media-body__title mt-0 mb-1">{{ $value[2]['title'] }}</h5></a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
        </div>
    @endforeach
  </div> <!-- end content -->
@endsection 