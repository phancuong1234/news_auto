@if($listNews->count() <= 0)
    <tr>
        <td colspan="5" class="nothing">
            không có thông tin gì ...
        </td>
    </tr>
@else
    @foreach($listNews as $listNews => $news)
        <tr>
            <td>
                {{ $news->id }}
            </td>
            <td>
                <a href="{{ route('pending.news.preview', $news->id) }}">
                    {{ $news->title }}
                </a>
            </td>
            <td>
                <a href="{{ (strpos($news->image, config('setting.type_img.img_of_serve')) === 0)?asset('images/news/'.$news->image):$news->image }}">
                    <img src="{{ (strpos($news->image, config('setting.type_img.img_of_serve')) === 0)?asset('images/news/'.$news->image):$news->image }}" class="img-in-list"/>
                </a>
            </td>
            <td>
                @if($news->is_active == config('setting.is_active.active'))
                    <label class="badge badge-gradient-success">Active</label>
                @else
                    <label class="badge badge-gradient-danger">Lock</label>
                @endif
            </td>
            <td>
                @can("edit-article")
                    <a href="{{ route('news.show', $news->id) }}">
                        <i class="mdi mdi-tooltip-edit"></i>
                    </a>
                @endcan
                @can("del-article")
                    <a href="javascript:void(0)" style="margin-left: 10%" onclick="submitFormDeleteHard('delete-news' + {{$news->id}})">
                        <i class="mdi mdi-delete"></i>
                    </a>
                @endcan
                {!! Form::open(['method' => 'DELETE', 'route' => ['news.destroy',$news->id], 'id'=>'delete-news'.$news->id]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
@endif
