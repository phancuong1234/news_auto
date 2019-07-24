@foreach($listCmt as $key => $value)
    <div class="row comment">
        <div class = "img-cmt">
            <img style="width: 110px;height: 110px" src="{{ (trim($value->image) == '' || $value->image == 'no-image.png') ? asset('/templates/images/no-image.png'):asset('/images/avatars/'.$value->image) }}" />
        </div>
        <div class = "content-cmt" id="content-cmt">
        <input type="hidden" name="id_cmt" value="{{ $value->id }}" id="id_cmt" >
        <p class = "text-left font-weight-bold" >{{ $value->username }}</p>
        <p class = "text-left font-weight-bold" >{{ $value->content }}</p>
        </div>
    </div>
@endforeach
