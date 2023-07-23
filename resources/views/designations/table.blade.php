<div class="table-responsive">
    <table class="table" id="designations-table">
        <thead>
        <tr>
            <th>@lang('models/designations.fields.name')</th>
        <th>@lang('models/designations.fields.details')</th>
        <th>@lang('models/designations.fields.create_by')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($designations as $designation)
            <tr>
                <td>{{ $designation->name }}</td>
            <td>{{ $designation->details }}</td>
            <td>{{ $designation->create_by }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['designations.destroy', $designation->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('designations.show', [$designation->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('designations.edit', [$designation->id]) }}"
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
