<div class="table-responsive">
    <table class="table" id="alkanProjects-table">
        <thead>
        <tr>
            <th>@lang('models/alkanProjects.fields.project_name')</th>
        <th>@lang('models/alkanProjects.fields.alkan_project_code')</th>
        <th>@lang('models/alkanProjects.fields.customer_project_code')</th>
        <th>@lang('models/alkanProjects.fields.project_detail')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($alkanProjects as $alkanProject)
            <tr>
                <td>{{ $alkanProject->project_name }}</td>
            <td>{{ $alkanProject->alkan_project_code }}</td>
            <td>{{ $alkanProject->customer_project_code }}</td>
            <td>{{ $alkanProject->project_detail }}</td>
                <td width="120">
                    {!! Form::open(['route' => [__('models/alkanProjects.router').'.destroy', $alkanProject->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route(__('models/alkanProjects.router').'.show', [$alkanProject->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route(__('models/alkanProjects.router').'.edit', [$alkanProject->id]) }}"
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
