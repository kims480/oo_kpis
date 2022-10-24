{{-- @push('third_party_stylesheets')
    @include('layouts.datatables_css')
@endpush
id
site__deployed
shelter_num
ref_wo
ref_cr
batter_1_sn
num_of_rect
rect_num
bank_num
install_date
aircon_status
rect_charge_status
old_batteries_aging
llvd
blvd
{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}

@push('third_party_scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endpush --}}
<div class="table-responsive">
    <table class="table table-striped table-sm table-bordered" id="governs-table">
        <thead>
        <tr>
            <th>@lang('models/batteryAdds.fields.site__deployed')</th>
            <th>@lang('models/batteryAdds.fields.batter_1_sn')</th>
            <th>@lang('models/batteryAdds.fields.shelter_num')</th>
            <th>@lang('models/batteryAdds.fields.ref_wo')</th>
            <th>@lang('models/batteryAdds.fields.ref_cr')</th>
            <th>@lang('models/batteryAdds.fields.num_of_rect')</th>
            <th>@lang('models/batteryAdds.fields.rect_num')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($batteries as $battery)
            <tr>
                <td>{{ $battery->site__deployed }}</td>
                <td>{{ $battery->batter_1_sn }}</td>
                <td>{{ $battery->shelter_num }}</td>
                <td>{{ $battery->ref_wo }}</td>
                <td>{{ $battery->ref_cr }}</td>
                <td>{{ $battery->num_of_rect }}</td>
                <td>{{ $battery->rect_num }}</td>
                <td class="flex justify-center">
                    {!! Form::open(['route' => ['batteryAdds.destroy', $battery->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('batteryAdds.show', [$battery->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('batteryAdds.edit', [$battery->id]) }}"
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
