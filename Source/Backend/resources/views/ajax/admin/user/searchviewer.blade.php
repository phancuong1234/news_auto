@if($list_viewer->count() <= 0)
    <tr>
        <td colspan="5" class="nothing">
            không có thông tin gì ...
        </td>
    </tr>
@else
@foreach($list_viewer as $key => $value)
    <tr>
        <td>
            {{$value->id}}
        </td>
        <td>
            {{$value->username}}
        </td>
        <td>
            {{$value->email}}
        </td>
        <td>
            @if($value->active == 1)
                <label class="badge badge-gradient-success">Active</label>
            @else
                <label class="badge badge-gradient-danger">Lock</label>
            @endif
        </td>
        <td>
            {{$value->updated_at}}
        </td>
        <td>
            <a href="javascript:void(0)" style="float: left;" onclick="submitFormDeleteHard('delete-category' + {{$value->id}})">
                <i class="mdi mdi-delete"></i>
            </a>
            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy',$value->id], 'id'=>'delete-category'.$value->id]) !!}
            {!! Form::close() !!}
            <a href="{{ route('users.edit',$value->id) }}">
                <i class="mdi mdi-tooltip-edit"></i>
            </a>
        </td>
    </tr>
@endforeach
@endif