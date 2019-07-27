@extends('layouts.user.master') @section('content')
    <div class="main__content col-xl-8 border-right" id="main-content">
        <div class="row mb-4">
            <div class="content__card col-xl-7">
                <a href="{{route('detail', [$main_new->slug_cate, $main_new->slug])}}"><img class="image__sidebar img-fluid img-news-home-big lazyload lazy" data-src="{{ (strpos($main_new->image, config('setting.type_img.img_of_serve')) === 0)?asset('images/news/'.$main_new->image):$main_new->image }}" alt="image-1"></a>
                <a class="media-body__title" href="{{route('detail', [$main_new->slug_cate, $main_new->slug])}}"><h4 class="card__title my-4">{{$main_new->title}}</h4></a>
                <p class="card__desc text-justify">{{$main_new->short_description}}</p>
            </div>
            <div class="content__list col-xl-5">
                @foreach($list_news as $key)
                    <ul class="list-unstyled">
                        <li class="media">
                            <a href="{{route('detail', [$key->slug_cate, $key->slug])}}" class="img-news-home">
                                <img class="mr-3 lazyload lazy" data-src="{{ (strpos($key->image, config('setting.type_img.img_of_serve')) === 0)?asset('images/news/'.$key->image):$key->image }}" alt="image-2">
                            </a>
                            <div class="media-body">
                                <a class="media-body__title mt-0 mb-1" href="{{route('detail', [$key->slug_cate, $key->slug])}}">{{ $key->title }}</a>
                            </div>
                        </li>
                    </ul>
                @endforeach
            </div>
        </div>
        @foreach($arrNews as $key => $value)
            <div class="category mb-1">
                <div class="category__name border-bottom border-success mb-2">
                    <button class="btn btn-success rounded-0"><a href="{{route('category', $value['slug'] )}}">{{ $value['name_category'] }}</a></button>
                </div>
                <div class="row">
                    <div class="category__content col-xl-7">
                        <a class="media-body__title" href="{{ route('detail', [$value[0]['slug_cate'], $value[0]['slug']]) }}"><h5 class="content__title mb-2">{{ $value[0]['title'] }}</h5></a>
                        <div class="media d-flex flex-column flex-sm-row mb-2">
                            <a href="{{ route('detail', [$value[0]['slug_cate'], $value[0]['slug']]) }}" class="img-news-home-md"><img class="mr-3 w100 lazyload lazy" data-src="{{ (strpos($value[0]['image'], config('setting.type_img.img_of_serve')) === 0)?asset('images/news/'.$value[0]['image']):$value[0]['image'] }}" alt="images/image-cagetory1"></a>
                            <div class="font__desc media-body text-justify">
                                {{ $value[0]['short_description'] }}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <ul class="list-unstyled">
                            <li class="media">
                                <a href="{{route('detail', [$value[1]['slug_cate'], $value[1]['slug']])}}" class="img-news-home"><img class="mr-3 lazyload lazy" data-src="{{ (strpos($value[1]['image'], config('setting.type_img.img_of_serve')) === 0)?asset('images/news/'.$value[1]['image']):$value[1]['image'] }}" alt="image-cagetory2"></a>
                                <div class="media-body">
                                    <a href="{{route('detail', [$value[1]['slug_cate'], $value[1]['slug']])}}"><h5 class="media-body__title mt-0 mb-1">{{ $value[1]['title'] }}</h5></a>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-unstyled">
                            <li class="media">
                                <a href="{{route('detail', [$value[2]['slug_cate'], $value[2]['slug']])}}" class="img-news-home"><img class="mr-3 lazyload lazy" data-src="{{ (strpos($value[2]['image'], config('setting.type_img.img_of_serve')) === 0)?asset('images/news/'.$value[2]['image']):$value[2]['image'] }}" alt="image-cagetory3"></a>
                                <div class="media-body">
                                    <a href="{{route('detail', [$value[2]['slug_cate'], $value[2]['slug']])}}"><h5 class="media-body__title mt-0 mb-1">{{ $value[2]['title'] }}</h5></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- end content -->
@endsection
