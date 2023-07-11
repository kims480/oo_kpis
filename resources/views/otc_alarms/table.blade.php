<div class="table-responsive">
    <table class="table" id="otcAlarms-table">
        <thead>
        <tr>
            <th>@lang('models/otcAlarms.fields.id')</th>
        <th>@lang('models/otcAlarms.fields.name')</th>
        <th>@lang('models/otcAlarms.fields.add_by')</th>
        <th>@lang('models/otcAlarms.fields.details')</th>
        <th>@lang('models/otcAlarms.fields.categ_id')</th>
        <th>@lang('models/otcAlarms.fields.notes')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($otcAlarms as $otcAlarms)
            <tr>
                <td>{{ $otcAlarms->id }}</td>
            <td>{{ $otcAlarms->name }}</td>
            <td>{{ $otcAlarms->add_by }}</td>
            <td>{{ $otcAlarms->details }}</td>
            <td>{{ $otcAlarms->categ_id }}</td>
            <td>{{ $otcAlarms->notes }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['otcAlarms.destroy', $otcAlarms->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('otcAlarms.show', [$otcAlarms->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('otcAlarms.edit', [$otcAlarms->id]) }}"
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
