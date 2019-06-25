@if($listCategories->count() <= 0)
    <tr>
        <td colspan="5" class="nothing">
            không có thông tin gì ...
        </td>
    </tr>
@else
    @foreach($listCategories as $value => $cate)
        <tr>
            <td>
                {{ $cate->id }}
            </td>
            <td>
                {{ $cate->name_category }}
            </td>
            <td>
                @if($cate->is_active == 1)
                    <label class="badge badge-gradient-success">Active</label>
                @else
                    <label class="badge badge-gradient-danger">Lock</label>
                @endif
            </td>
            <td class="text_overfollow">
                {{ (isset($cate->url_cate)) ? $cate->url_cate:"Chưa cập nhật..." }}
            </td>
            <td>
                <a href="{{ route('categories.show', $cate->id) }}">
                    <i class="mdi mdi-tooltip-edit"></i>
                </a>
                <a href="javascript:void(0)" style="margin-left: 10%" onclick="submitFormDeleteHard('delete-category' + {{$cate->id}})">
                    <i class="mdi mdi-delete"></i>
                </a>
                {!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy',$cate->id], 'id'=>'delete-category'.$cate->id]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
@endif
