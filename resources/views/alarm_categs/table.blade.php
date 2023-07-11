<div class="table-responsive">
    <table class="table" id="alarmCategs-table">
        <thead>
        <tr>
            <th>@lang('models/alarmCategs.fields.id')</th>
        <th>@lang('models/alarmCategs.fields.categ_name')</th>
        <th>@lang('models/alarmCategs.fields.added_by')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($alarmCategs as $alarmCateg)
            <tr>
                <td>{{ $alarmCateg->id }}</td>
            <td>{{ $alarmCateg->categ_name }}</td>
            <td>{{ $alarmCateg->added_by }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['alarmCategs.destroy', $alarmCateg->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('alarmCategs.show', [$alarmCateg->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('alarmCategs.edit', [$alarmCateg->id]) }}"
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
