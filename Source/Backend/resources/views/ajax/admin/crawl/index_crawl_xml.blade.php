<div id="screen-info">
    <strong> Tiêu đề trang : {{ $contentXML['channel']['title'] }}</strong><br />
    <strong>Liên kết trang: {{ $contentXML['channel']['link'] }}</strong><br />
    <strong>Mô tả trang: {{ $contentXML['channel']['description'] }}</strong><br /><br />
    @foreach($contentXML['channel']['item'] as $key => $value)
        <span> <strong> Tin tức số </strong> {{ $key + 1 }}</span><br />
        <span><strong>Tiêu Đề</strong> :{{ $value['title'] }}</span><br />
        <span><strong>Mô Tả Ngắn</strong> :{{ $value['description'] }}</span><br /><br />
    @endforeach
</div>
