<div class="table-responsive">
    <table class="table" id="employees-table">
        <thead>
        <tr>
            <th>@lang('models/employees.fields.name')</th>
        <th>@lang('models/employees.fields.phone')</th>
        <th>@lang('models/employees.fields.civil_id')</th>
        <th>@lang('models/employees.fields.hr_code')</th>
        <th>@lang('models/employees.fields.project_id')</th>
        <th>@lang('models/employees.fields.designation_id')</th>
        <th>@lang('models/employees.fields.title_id')</th>
        <th>@lang('models/employees.fields.office_id')</th>
        <th>@lang('models/employees.fields.dept_id')</th>
        <th>@lang('models/employees.fields.hiring_date')</th>
        <th>@lang('models/employees.fields.salary')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->first_name .' '. $employee->mid_name.' ' .$employee->last_name  }}</td>

            <td>{{ $employee->phone }}</td>
            <td>{{ $employee->civil_id }}</td>
            <td>{{ $employee->hr_code }}</td>
            <td>{{ $employee->project_id }}</td>
            <td>{{ $employee->designation_id }}</td>
            <td>{{ $employee->title_id }}</td>
            <td>{{ $employee->office_id }}</td>
            <td>{{ $employee->dept_id }}</td>
            <td>{{ $employee->hiring_date }}</td>
            <td>{{ $employee->salary }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['designations.destroy', $employee->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('employees.show', [$employee->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('employees.edit', [$employee->id]) }}"
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
