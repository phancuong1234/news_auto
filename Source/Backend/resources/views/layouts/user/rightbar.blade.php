<div class="main__aside col-xl-4">
          <img class="img-fluid image__sidebar mb-4 d-none d-xl-block" src="{{asset('templates/user/images/image-sidebar1.jpg')}}" alt="image-sidebar1">
          <div class="read_most">
            <h5 class="py-2 border-bottom border-success">ĐỌC NHIỀU NHẤT</h5>
            @foreach($top_view as $key)
              <ul class="list-unstyled">
                <li class="media">
                  <a href="{{route('detail', $key->id)}}"><img class="mr-3 image--size" src="{{ $key->image }}" alt="image-2"></a>
                  <div class="media-body">
                    <a href="{{route('detail', $key->id)}}"><h5 class="media-body__title mt-0 mb-1">{{$key->title}}</h5></a>
                  </div>
                </li>
              </ul>
            @endforeach
          </div>
          <img class="img-fluid image__sidebar mt-3 d-none d-xl-block" style="height: 525px" src="{{asset('templates/user/images/image-sidebar2.jpg')}}" alt="image-sidebar2">
        </div> <!-- end aside -->
      </div>
    </div>
</div>
</div>
</div>
  