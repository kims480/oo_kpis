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
        <th>@lang('models/consumableSpares.fields.muscat_stk')</th>
        <th>@lang('models/consumableSpares.fields.sll_stk')</th>
        <th>@lang('models/consumableSpares.fields.shr_stk')</th>
        <th>@lang('models/consumableSpares.fields.nzw_stk')</th>
        <th>@lang('models/consumableSpares.fields.ibra_stk')</th>
        <th>@lang('models/consumableSpares.fields.ibri_stk')</th>
        <th>@lang('models/consumableSpares.fields.adm_stk')</th>
        <th>@lang('models/consumableSpares.fields.swq_stk')</th>
        <th>@lang('models/consumableSpares.fields.dqm_stk')</th>
        <th>@lang('models/consumableSpares.fields.sur_stk')</th>
        <th>@lang('models/consumableSpares.fields.khasab_stk')</th>
        <th>@lang('models/consumableSpares.fields.haima_stk')</th>
        <th>@lang('models/consumableSpares.fields.total_stk')</th>
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
            <td>{{ $consumableSpare->muscat_stk }}</td>
            <td>{{ $consumableSpare->sll_stk }}</td>
            <td>{{ $consumableSpare->shr_stk }}</td>
            <td>{{ $consumableSpare->nzw_stk }}</td>
            <td>{{ $consumableSpare->ibra_stk }}</td>
            <td>{{ $consumableSpare->ibri_stk }}</td>
            <td>{{ $consumableSpare->adm_stk }}</td>
            <td>{{ $consumableSpare->swq_stk }}</td>
            <td>{{ $consumableSpare->dqm_stk }}</td>
            <td>{{ $consumableSpare->sur_stk }}</td>
            <td>{{ $consumableSpare->khasab_stk }}</td>
            <td>{{ $consumableSpare->haima_stk }}</td>
            <td>{{ $consumableSpare->total_stk }}</td>
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
