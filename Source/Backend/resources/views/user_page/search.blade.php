@extends('layouts.user.master')
@section('content')
    <div class="main__content col-xl-8  border-right" id="main-content">
    <h2 class="mb-5">Tìm kiếm từ khóa "{{ $keyword }}"</h2>
    @foreach($NewSearch as $key)
      <div class="row media mb-3 search-news">
        <a class="cate__img col-12 col-md-4 w100" href="{{route('detail', $key->id)}}"><img class="img-news-search" src="{{$key->image}}" alt="category1"></a>
        <div class="media-body col-12 col-12 col-md-8">
            <a href="http://127.0.0.1:8000/detail/199" class="media-body__title"><h5 class="cate__title my-0">{{$key->title}}</h5></a>
            <small class="cate__time text-black-50 mb-2"><i class="far fa-clock mr-2"></i>{{date_format($key->created_at,"d/m/Y")}}</small>
            <p class="cate__desc text-justify">{{$key->short_description}}</p>
        </div>
      </div>
    @endforeach
    <div class="row mt-5" style="margin-left: 16%" >{{$NewSearch->appends(['key' => $keyword])->links()}}
		</div>
    </div><!-- end content -->
@endsection