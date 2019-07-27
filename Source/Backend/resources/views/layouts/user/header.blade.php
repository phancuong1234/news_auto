<!DOCTYPE html>
<html lang="vi">
<head>
  <title>VIETSOZ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{ Html::style(asset('templates/user/css/bootstrap.min.css')) }}
  {{ Html::style(asset('templates/user/style/style.css')) }}
</head>
<body>
  <nav class="navbar navbar-expand-xl navbar-light border-bottom border-black-50">
    <div class="container">
      <a class="nav__logo--impact navbar-brand text-success" href="{{route('home-page')}}">VIETSOZ</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar__item--roboto navbar-nav mr-auto text-danger">
          @foreach($list_category as $list)
            <li class="nav-item">
              <a class="nav-link" href="{{route('category',$list->slug)}}">{{$list->name_category}}</a>
            </li>
          @endforeach
        </ul>
        <form class="form-inline my-2 my-lg-0 inner-addon right-addon typeahead" id="search-box" action="{{route('search')}}" role="search">
          <input class="form-search__placeholder form-control mr-sm-2 search-input" name="key" type="search" placeholder="Tìm kiếm" autocomplete="off" aria-label="Search">
          <i class="fa fa-search" id="search-box-icon"></i>
        </form>
      </div>
    </div>
  </nav> <!-- end nav -->
