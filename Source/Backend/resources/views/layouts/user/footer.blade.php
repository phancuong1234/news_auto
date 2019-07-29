<div class="footer bg-success text-white py-5">
    <div class="container">
      <div class="row">
        <div class="footer__about col-lg-6 col-xl-3">
          <h3 class="mb-4">VỀ CHÚNG TÔI</h3>
          <p class="text-justify"><b>VIETSOZ</b> được thành lập vào tháng 8 năm 2016, hứa hẹn sẽ là một công ty
          hàng đầu sẽ cung cấp các giải pháp công nghệ tốt nhất cả trong nước và ngoài nước</p>
          <p><i class="far fa-envelope mr-3"></i>support@vietsoz.com</p>
          <p><i class="fas fa-phone-alt mr-3"></i>09.660.12.440</p>
        </div>
        <div class="footer__category col-lg-6 col-xl-2">
          <h3 class="mb-4">DANH MỤC</h3>
          @foreach($list_category as $key)
            <p><span class="mr-3">&gt;</span><a class="font-white" href="{{route('category', $key->slug)}}">{{$key->name_category}}</a></p>
          @endforeach
        </div>
        <div class="footer__highlight-news col-lg-6 col-xl-4">
          <h3 class="mb-4">TIN TỨC NỔI BẬT</h3>
          @foreach($title_news as $key)
            <p><span class="mr-3">&gt;</span><a class="font-white" href="{{route('detail', [$key->slug_cate, $key->slug])}}">{{$key->title}}</a></p>
          @endforeach
        </div>
        <div class="footer__fanpage col-lg-6 col-xl-3">
          <h3 class="mb-4">FANPAGE</h3>
          <img src="{{asset('templates/user/images/image-fanpage.jpg')}}" alt="fanpage">
        </div>
      </div>
    </div>
  </div> <!-- end footer -->
  <div class="copy-right">
    <div class="container">
      <div class="row text-center py-2">
        <div class="font col-12">
          &copy; 2017 All right reserved - Bản quyền thuộc về VIETSOZ.com
        </div>
      </div>
    </div>
  </div>
    {{ Html::script(asset('templates/user/js/jquery.min.js')) }}
    {{ Html::script(asset('templates/user/js/jquery.lazy.min.js')) }}
    {{ Html::script(asset('templates/user/js/lazysizes.min.js')) }}
    {{ Html::script(asset('templates/user/js/typeahead.bundle.min.js')) }}
    {{ Html::script(asset('messages.js')) }}
    {{ Html::script(asset('templates/user/js/popper.min.js')) }}
    {{ Html::script(asset('/templates/admin/js/jquery.validate.min.js')) }}
    {{ Html::script(asset('/templates/user/js/validate-user.js')) }}
    {{ Html::script(asset('templates/user/js/jsforuser.js')) }}
    {{ Html::script(asset('templates/user/js/bootstrap.min.js')) }}
    {{ Html::script(asset('templates/user/fonts/all.js')) }}
    {{ Html::script(asset('templates/user/js/searchtypehead.js')) }}
</body>
</html>
