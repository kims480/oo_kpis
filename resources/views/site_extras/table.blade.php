<div class="table-responsive">
    <table class="table" id="siteExtras-table">
        <thead>
        <tr>
            <th>@lang('models/siteExtras.fields.id')</th>
        <th>@lang('models/siteExtras.fields.site__id')</th>
        <th>@lang('models/siteExtras.fields.added_by')</th>
        <th>@lang('models/siteExtras.fields.contract_prio')</th>
        <th>@lang('models/siteExtras.fields.prio_2022')</th>
        <th>@lang('models/siteExtras.fields.contract_severity')</th>
        <th>@lang('models/siteExtras.fields.severity_2022')</th>
        <th>@lang('models/siteExtras.fields.connected_sites')</th>
        <th>@lang('models/siteExtras.fields.connected_omc')</th>
        <th>@lang('models/siteExtras.fields.connected_ip')</th>
        <th>@lang('models/siteExtras.fields.connected_sdh')</th>
        <th>@lang('models/siteExtras.fields.landlord_owner')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($siteExtras as $siteExtra)
            <tr>
                <td>{{ $siteExtra->id }}</td>
            <td>{{ $siteExtra->site__id }}</td>
            <td>{{ $siteExtra->added_by }}</td>
            <td>{{ $siteExtra->contract_prio }}</td>
            <td>{{ $siteExtra->prio_2022 }}</td>
            <td>{{ $siteExtra->contract_severity }}</td>
            <td>{{ $siteExtra->severity_2022 }}</td>
            <td>{{ $siteExtra->connected_sites }}</td>
            <td>{{ $siteExtra->connected_omc }}</td>
            <td>{{ $siteExtra->connected_ip }}</td>
            <td>{{ $siteExtra->connected_sdh }}</td>
            <td>{{ $siteExtra->landlord_owner }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['siteExtras.destroy', $siteExtra->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('siteExtras.show', [$siteExtra->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('siteExtras.edit', [$siteExtra->id]) }}"
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
