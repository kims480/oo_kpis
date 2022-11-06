<div class="table-responsive">
    <table class="table" id="passiveSpares-table">
        <thead>
        <tr>
            <th>@lang('models/passiveSpares.fields.id')</th>
        <th>@lang('models/passiveSpares.fields.old_bom')</th>
        <th>@lang('models/passiveSpares.fields.new_bom')</th>
        <th>@lang('models/passiveSpares.fields.description')</th>
        <th>@lang('models/passiveSpares.fields.uom')</th>
        <th>@lang('models/passiveSpares.fields.Important')</th>
        <th>@lang('models/passiveSpares.fields.high_consumption')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($passiveSpares as $passiveSpare)
            <tr>
                <td>{{ $passiveSpare->id }}</td>
            <td>{{ $passiveSpare->old_bom }}</td>
            <td>{{ $passiveSpare->new_bom }}</td>
            <td>{{ $passiveSpare->description }}</td>
            <td>{{ $passiveSpare->uom }}</td>
            <td>{{ $passiveSpare->Important }}</td>
            <td>{{ $passiveSpare->high_consumption }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['passive-spares.destroy', $passiveSpare->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('passive-spares.show', [$passiveSpare->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('passive-spares.edit', [$passiveSpare->id]) }}"
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
