@if($listActivities->count() <= 0)
    <tr>
        <td colspan="5" class="nothing">
            không có thông tin gì ...
        </td>
    </tr>
@else
    @foreach($listActivities as $key => $value)
        <tr>
            <td>
                @if ($value->type_active != config('setting.type_active.news.delete'))
                    <a @if(isset($value->title)) href="{{ route('pending.news.preview', [$value->id_news, config('setting.type_preview.preview_of_news')]) }}" @endif>
                        {{ (isset($value->title) ? $value->content.'. ( '.$value->title.' )' : $value->content)}}
                    </a>
                @elseif($value->type_active == config('setting.type_active.news.crawl'))
                    {{ $value->content }}
                @else
                    {{ $value->content }}
                @endif
            </td>
            <td style="float: right">
                {{  date("H:i:s d-m-Y", strtotime($value->created_at)) }}
            </td>
        </tr>
    @endforeach
@endif
