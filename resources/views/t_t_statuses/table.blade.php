<div class="table-responsive">
    <table class="table" id="tTStatuses-table">
        <thead>
        <tr>
            <th>@lang('models/tTStatuses.fields.name')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($tTStatuses as $tTStatus)
            <tr>
                <td>{{ $tTStatus->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['tTStatuses.destroy', $tTStatus->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tTStatuses.show', [$tTStatus->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('tTStatuses.edit', [$tTStatus->id]) }}"
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
