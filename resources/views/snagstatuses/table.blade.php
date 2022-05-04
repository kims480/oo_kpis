<div class="table-responsive table-striped table-sm table-bordered">
    <table class="table" id="snagstatuses-table">
        <thead>
        <tr>
            <th>@lang('models/snagstatuses.fields.id')</th>
        <th>@lang('models/snagstatuses.fields.name')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($snagstatuses as $snagstatus)
            <tr>
                <td>{{ $snagstatus->id }}</td>
            <td>{{ $snagstatus->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => [__('models/snagstatuses.url').'.destroy', $snagstatus->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route(__('models/snagstatuses.url').'.show', [$snagstatus->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route(__('models/snagstatuses.url').'.edit', [$snagstatus->id]) }}"
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
