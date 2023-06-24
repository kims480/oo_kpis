<div class="table-responsive">
    <table class="table" id="consumableSpares-table">
        <thead>
        <tr>
            <th>@lang('models/consumableSpares.fields.id')</th>
        <th>@lang('models/consumableSpares.fields.old_bom')</th>
        <th>@lang('models/consumableSpares.fields.new_bom')</th>
        <th>@lang('models/consumableSpares.fields.description')</th>
        <th>@lang('models/consumableSpares.fields.uom')</th>
        <th>@lang('models/consumableSpares.fields.Important')</th>
        <th>@lang('models/consumableSpares.fields.high_consumption')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($consumableSpares as $consumableSpare)
            <tr>
                <td>{{ $consumableSpare->id }}</td>
            <td>{{ $consumableSpare->old_bom }}</td>
            <td>{{ $consumableSpare->new_bom }}</td>
            <td>{{ $consumableSpare->description }}</td>
            <td>{{ $consumableSpare->uom }}</td>
            <td>{{ $consumableSpare->Important }}</td>
            <td>{{ $consumableSpare->high_consumption }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['consumable-spares.destroy', $consumableSpare->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('consumable-spares.show', [$consumableSpare->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('consumable-spares.edit', [$consumableSpare->id]) }}"
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
