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
<div class="scrollbar-thin scrollbar-thumb-slate-700 scrollbar-track-slate-300">
    <table class=" w-full table-auto mb-2  {{-- h-32  --}}">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-center">Site_ID</th>
            <th class="py-3 px-6 text-center">Battery SN</th>
            <th class="py-3 px-6 text-center">@lang('models/batteryAdds.fields.shelter_num')</th>
            <th class="py-3 px-6 text-center">@lang('models/batteryAdds.fields.ref_wo')</th>
            <th class="py-3 px-6 text-center">@lang('models/batteryAdds.fields.ref_cr')</th>
            <th class="py-3 px-6 text-center">@lang('models/batteryAdds.fields.num_of_rect')</th>
            <th class="py-3 px-6 text-center">@lang('models/batteryAdds.fields.rect_num')</th>
            <th class="py-3 px-6 text-center">@lang('models/batteryAdds.fields.bank_num')</th>
            <th class="py-3 px-6 text-center">@lang('models/batteryAdds.fields.added_by')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
         @foreach($batteries as $battery)
            <tr x-data="{opacity: {{$loop->last==$loop->iteration}}}" class="text-center border-b border-gray-200 odd:bg-gray-50 hover:bg-gray-100 [visibility:none]   animate-dropdown [animation-delay:{{$loop->iteration*0.1}}s]" :class="opacity ? 'opacity-100':'opacity-0'">
                <td class="text-sm">{{ $battery->site->site_id }}</td>
                <td class="text-xs">{{ $battery->batter_1_sn }}</td>
                <td class="text-xs">{{ $battery->ref_wo }}</td>
                <td class="text-xs">{{ $battery->ref_cr }}</td>
                <td class="text-sm">{{ $battery->shelter_num }}</td>
                <td class="text-sm">{{ $battery->num_of_rect }}</td>
                <td class="text-sm">{{ $battery->rect_num }}</td>
                <td class="text-sm">{{ $battery->bank_num }}</td>
                <td class="text-xs">{{ $battery->user->name }}</td>
                <td class="flex justify-center flex-nowrap">
                    {!! Form::open(['route' => [__('models/batteryAdds.singular').'.destroy', $battery->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route(__('models/batteryAdds.singular').'.show', [$battery->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        @if ($battery->added_by == Auth::user()->id || Auth::user()->isSuperAdmin())

                        <a href="{{ route(__('models/batteryAdds.singular').'.edit', [$battery->id]) }}"
                           class='btn btn-success btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endif
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
         @endforeach
        </tbody>
    </table>
</div>
