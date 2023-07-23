<div class="table-responsive">
    <table class="table" id="departments-table">
        <thead>
        <tr>
            <th>@lang('models/departments.fields.name')</th>
        <th>@lang('models/departments.fields.details')</th>
        <th>@lang('models/departments.fields.created_by')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($departments as $department)
            <tr>
                <td>{{ $department->name }}</td>
            <td>{{ $department->details }}</td>
            <td>{{ $department->created_by }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['departments.destroy', $department->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('departments.show', [$department->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('departments.edit', [$department->id]) }}"
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
