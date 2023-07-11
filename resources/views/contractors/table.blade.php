<div class="table-responsive">
    <table class="table" id="contractors-table">
        <thead>
        <tr>
            <th>@lang('models/contractors.fields.id')</th>
        <th>@lang('models/contractors.fields.name')</th>
        <th>@lang('models/contractors.fields.info')</th>
        <th>@lang('models/contractors.fields.address')</th>
        <th>@lang('models/contractors.fields.lat')</th>
        <th>@lang('models/contractors.fields.long')</th>
        <th>@lang('models/contractors.fields.added_by')</th>
        <th>@lang('models/contractors.fields.register_number')</th>
        <th>@lang('models/contractors.fields.website')</th>
        <th>@lang('models/contractors.fields.info_mail')</th>
        <th>@lang('models/contractors.fields.it_mail')</th>
        <th>@lang('models/contractors.fields.proc_email')</th>
        <th>@lang('models/contractors.fields.operation_mail')</th>
        <th>@lang('models/contractors.fields.admin_mail')</th>
        <th>@lang('models/contractors.fields.ceo_mail')</th>
        <th>@lang('models/contractors.fields.project_manager_mail')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($contractors as $contractor)
            <tr>
                <td>{{ $contractor->id }}</td>
            <td>{{ $contractor->name }}</td>
            <td>{{ $contractor->info }}</td>
            <td>{{ $contractor->address }}</td>
            <td>{{ $contractor->lat }}</td>
            <td>{{ $contractor->long }}</td>
            <td>{{ $contractor->added_by }}</td>
            <td>{{ $contractor->register_number }}</td>
            <td>{{ $contractor->website }}</td>
            <td>{{ $contractor->info_mail }}</td>
            <td>{{ $contractor->it_mail }}</td>
            <td>{{ $contractor->proc_email }}</td>
            <td>{{ $contractor->operation_mail }}</td>
            <td>{{ $contractor->admin_mail }}</td>
            <td>{{ $contractor->ceo_mail }}</td>
            <td>{{ $contractor->project_manager_mail }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['contractors.destroy', $contractor->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contractors.show', [$contractor->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('contractors.edit', [$contractor->id]) }}"
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
