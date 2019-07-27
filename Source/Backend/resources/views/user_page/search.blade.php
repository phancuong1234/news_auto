@extends('layouts.user.master') @section('content')
    <div class="main__content col-xl-8  border-right" id="main-content">
        <h2 class="mb-5">Tìm kiếm từ khóa "<strong class="tt-highlight">{{ $keyword }}</strong>"</h2> @foreach($NewSearch as $key)
            <div class="row media mb-3 search-news">
                <a class="cate__img col-12 col-md-4 w100" href="{{route('detail', [$key->slug_cate, $key->slug])}}">
                    <img class="img-news-search" src="{{ (strpos($key->image, config('setting.type_img.img_of_serve')) === 0)?asset('images/news/'.$key->image):$key->image }}" alt="category1">
                </a>
                <div class="media-body col-12 col-12 col-md-8">
                    <a href="{{route('detail', [$key->slug_cate, $key->slug])}}" class="media-body__title"><h5 class="cate__title my-0">{{$key->title}}</h5></a>
                    <small class="cate__time text-black-50 mb-2">
                        <i class="far fa-clock mr-2"></i>{{date_format($key->created_at,"d/m/Y")}}
                        <i class="far fa-eye mr-2 ml-2"></i>{{ $key->number_view }}
                    </small>
                    <p class="cate__desc text-justify">{{$key->short_description}}</p>
                </div>
            </div>
        @endforeach
        <div class="row mt-5" style="margin-left: 16%">{{$NewSearch->appends(['key' => $keyword])->links()}}
        </div>
        <input type="hidden" value="{{ $keyword }}" id="getkeyword" />
    </div>
    <script>
        window.onload = function()
        {
            var key = $('#getkeyword').val();
            var lenght = $('.cate__title').length;
            var n = 0;
            while (n < lenght){
                var strTitle = $('.cate__title').eq(n).text();
                var strDescription = $('.cate__desc').eq(n).text();
                var hightLightDesc = strDescription.replace(key, "<strong class='tt-highlight'>"+key+"</strong>");
                var hightLightDesc = hightLightDesc.replace(key.toUpperCase(), "<strong class='tt-highlight'>"+key.toUpperCase()+"</strong>");
                var hightLightDesc = hightLightDesc.replace(key.toLowerCase(), "<strong class='tt-highlight'>"+key.toLowerCase()+"</strong>");
                var hightLightTitle = strTitle.replace(key, "<strong class='tt-highlight'>"+key+"</strong>");
                var hightLightTitle = hightLightTitle.replace(key.toLowerCase(), "<strong class='tt-highlight'>"+key.toLowerCase()+"</strong>");
                var hightLightTitle = hightLightTitle.replace(key.toUpperCase(), "<strong class='tt-highlight'>"+key.toUpperCase()+"</strong>");
                $('.cate__title').eq(n).html(hightLightTitle);
                $('.cate__desc').eq(n).html(hightLightDesc);
                n++;
            }
        };
    </script>
@endsection
