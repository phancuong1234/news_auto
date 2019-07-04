@if($listRSS->count() <= 0)
    <tr>
        <td colspan="6" class="nothing">
            không có thông tin gì ...
        </td>
    </tr>
@else
    @foreach($listRSS as $listRSS => $news)
        <tr>
            <td>
                {{ $news->id }}
            </td>
            <td>
                {{ $news->name_page }}
            </td>
            <td>
                {{ $news->category }}
            </td>
            <td>
                {{ $news->title }}
            </td>
            <td>
                @if($news->active == config('setting.is_active.active'))
                    <label class="badge badge-gradient-success">Active</label>
                @else
                    <label class="badge badge-gradient-danger">Lock</label>
                @endif
            </td>
            <td>
                <a href="{{ route('rss.show', $news->id) }}">
                    <i class="mdi mdi-tooltip-edit"></i>
                </a>
                <a href="javascript:void(0)" style="margin-left: 10%" onclick="submitFormDeleteHard('delete-news' + {{$news->id}})">
                    <i class="mdi mdi-delete"></i>
                </a>
                {!! Form::open(['method' => 'DELETE', 'route' => ['rss.destroy',$news->id], 'id'=>'delete-news'.$news->id]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
@endif
