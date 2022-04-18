<div class="table-responsive">
    <table class="table table-striped table-sm table-bordered" id="governs-table">
        <thead>
        <tr>
            <th>@lang('models/governs.fields.name')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($governs as $govern)
            <tr>
                <td>{{ $govern->name }}</td>
                <td class="flex justify-center">
                    {!! Form::open(['route' => ['governs.destroy', $govern->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('governs.show', [$govern->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('governs.edit', [$govern->id]) }}"
                           class='btn btn-success btn-xs'>
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
