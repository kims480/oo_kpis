<div class="table-responsive table-striped table-sm table-bordered">
    <table class="table" id="snagremarks-table">
        <thead>
        <tr>
            <th>@lang('models/snagremarks.fields.id')</th>
        <th>@lang('models/snagremarks.fields.remark')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($snagremarks as $snagremark)
            <tr>
                <td>{{ $snagremark->id }}</td>
            <td>{{ $snagremark->remark }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['snagremarks.destroy', $snagremark->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('snagremarks.show', [$snagremark->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('snagremarks.edit', [$snagremark->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
         @endforeach
        </tbody>
    </table>
</div>
