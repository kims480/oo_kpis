<div class="table-responsive table-striped table-sm table-bordered">
    <table class="table" id="snagreporters-table">
        <thead>
        <tr>
            <th>@lang('models/snagreporters.fields.id')</th>
        <th>@lang('models/snagreporters.fields.name')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($snagreporters as $snagreporter)
            <tr>
                <td>{{ $snagreporter->id }}</td>
            <td>{{ $snagreporter->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['snagreporters.destroy', $snagreporter->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('snagreporters.show', [$snagreporter->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('snagreporters.edit', [$snagreporter->id]) }}"
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
