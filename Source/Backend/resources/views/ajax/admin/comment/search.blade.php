@if($list_comments->count() <= 0)
    <tr>
        <td colspan="6" class="nothing">
            không có thông tin gì ...
        </td>
    </tr>
@else
    @foreach($list_comments as $value => $cmt)
        <tr>
            <td>
                {{ $cmt->id }}
            </td>
            <td>
                <a href="/{{ $cmt->link }}" target="_blank">
                    {{ $cmt->title_news }}
                </a>
            </td>
            <td>
                {{ $cmt->username }}
            </td>
            <td>
                {{ $cmt->content }}
            </td>
            <td>
                @if($cmt->is_active == config('setting.is_active.active'))
                    <label class="badge badge-gradient-success" onclick="">Active</label>
                @else
                    <label class="badge badge-gradient-danger" onclick="">Lock</label>
                @endif
            </td>
            <td>
                <a href="javascript:void(0)" style="margin-left: 10%" onclick="submitFormDeleteHard('delete-comment' + {{ $cmt->id }})">
                    <i class="mdi mdi-delete"></i>
                </a>
                {!! Form::open(['method' => 'DELETE', 'route' => ['comments.destroy',$cmt->id], 'id'=>'delete-comment'.$cmt->id]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
@endif
