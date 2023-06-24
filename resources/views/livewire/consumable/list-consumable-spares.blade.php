<div class="card w-full p-0" x-data={filtersOn:false}>
    <div class="card-body p-0 relative w-full ">
        <div class="py-1 bg-slate-700 w-full flex border-b-2 border-amber-500 border-solid mb-2">
            @include('flash::message')
            <div class="transition-all duration-300 absolute top-2 right-1/2  bg-stone-200 text-sm text-blue-900 p-2 border-l-8 border-stone-600 rounded-md opacity-80"
                wire:loading>
                Processing Data...
                <svg class="inline-block animate-spin -mr-1 ml-3 h-5 w-5 text-amber-400"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
            </div>
            <div class="options flex flex-wrap justify-between pb-2 items-center border-b-2 border-slate-800">
                @can(__('models/batteryAdds.singular') . '.upload')
                    <div class="form">


                        <form class="flex flex-nowrap mb-1" wire:submit.prevent="import">
                            <input type="file" wire:model="your_file">

                            @error('your_file')
                                <span class="error">{{ $message }}</span>
                            @enderror

                            <button class="p-1 rounded shadow-sm bg-gray-50 text-slate-900 text-sm" type="submit"
                                wire:loading.attr="disabled">Upload Sites</button>
                        </form>

                    </div>
                @endcan

                <div class="form-check flex form-switch ml-auto mr-2">
                    <div class="form-groups sm:w-full flex flex-nowrap items-center mr-2">
                        <label for="snag" class="col-form-label text-slate-50 text-md-right mr-1">#Results: </label>
                        <select wire:model="perPage" class="form-control block ">
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>

                    </div>
                    <div class="form-groups  items-center flex flex-nowrap ">
                        <input
                            class="form-check-input appearance-none w-9 ml-10 rounded-full float-left h-5 align-top bg-white bg-no-repeat bg-contain bg-gray-300 focus:outline-none cursor-pointer shadow-sm"
                            type="checkbox" role="switch" id="flexSwitchCheckChecked" @click="filtersOn=!filtersOn">
                        <label class="form-check-label inline-block text-white font-bold"
                            for="flexSwitchCheckChecked">Filter</label>
                    </div>
                </div>
                @can(__('models/consumableSpares.route') . '.create')
                    <a class="transition text-amber-800 bg-amber-50 ease-in-out btn btn-default relative has-tooltips text-sm hover:bg-cyan-900 hover:text-slate-50"
                        href="{{ route(__('models/consumableSpares.route') . '.create') }}">
                        @lang('crud.add_new')
                    </a>
                @endcan
                @can(__('models/batteryAdds.singular') . '.export')
                    <button wire:click.prevent="export" x-data={isOpen:false}
                        class="transition text-amber-800 bg-amber-50 ease-in-out btn btn-default relative has-tooltips text-sm "
                        data-mdb-ripple="true" @mouseover="isOpen=true" @mouseover.away="isOpen=false">
                        <x-tooltip message='Export excel' />
                        <i class="far fa-file-excel text-amber-800 "></i> Export
                    </button>
                @endcan
            </div>
        </div>
        <div class="scrollbar-thin scrollbar-thumb-slate-700 scrollbar-track-slate-300">
            <table class=" w-full table-auto mb-2  {{-- h-32  --}}">


                <thead>
                    <tr x-show="filtersOn">
                        <th>
                            {{-- {!! Form::text('id', null, ['class' => 'text-sm border-0 rounded-none border-b-2 p-1 ', 'placeholder' => __('models/sites.fields.id'), 'wire:model' => '']) !!} --}}

                        </th>

                        <th>
                            {!! Form::text('old_bom', null, [
                                'class' => 'text-sm border-0 rounded-none border-b-2 p-1 ',
                                'placeholder' => __('models/consumableSpares.fields.old_bom'),
                                'wire:model.debounce' => 'old_bom',
                            ]) !!}
                        </th>
                        <th>
                            {!! Form::text('new_bom', null, [
                                'class' => 'text-sm border-0 rounded-none border-b-2 p-1 ',
                                'placeholder' => __('models/consumableSpares.fields.new_bom'),
                                'wire:model.debounce' => 'new_bom',
                            ]) !!}
                        </th>
                        <th>
                            {!! Form::text('description', null, [
                                'class' => 'text-sm border-0 rounded-none border-b-2 p-1 ',
                                'placeholder' => __('models/consumableSpares.fields.description'),
                                'wire:model.debounce' => 'description',
                            ]) !!}
                        </th>
                        <th> {!! Form::text('uom', null, [
                            'class' => 'text-sm border-0 rounded-none border-b-2 p-1 ',
                            'placeholder' => __('models/consumableSpares.fields.uom'),
                            'wire:model.debounce' => 'uom',
                        ]) !!}
                        </th>
                        <th> {!! Form::text('Important', null, [
                            'class' => 'text-sm border-0 rounded-none border-b-2 p-1 ',
                            'placeholder' => __('models/consumableSpares.fields.Important'),
                            'wire:model.debounce' => 'Important',
                        ]) !!}
                        </th>
                        <th> {!! Form::text('high_consumption', null, [
                            'class' => 'text-sm border-0 rounded-none border-b-2 p-1 ',
                            'placeholder' => __('models/consumableSpares.fields.high_consumption'),
                            'wire:model.debounce' => 'high_consumption',
                        ]) !!}
                        </th>

                        <th>
                            {{-- {!! Form::text('address', null, ['class' => 'text-sm border-0 rounded-none border-b-2 p-1 ', 'placeholder' => __('models/sites.fields.address'), 'wire:model' => '']) !!} --}}
                        </th>

                    </tr>

                    <tr class="bg-gray-700 text-slate-50 uppercase text-sm leading-normal">
                        <th>@lang('models/consumableSpares.fields.id')</th>
                        <th>@lang('models/consumableSpares.fields.old_bom')</th>
                        <th>@lang('models/consumableSpares.fields.new_bom')</th>
                        <th>@lang('models/consumableSpares.fields.description')</th>
                        <th>@lang('models/consumableSpares.fields.uom')</th>
                        <th>@lang('models/consumableSpares.fields.Important')</th>
                        <th>@lang('models/consumableSpares.fields.high_consumption')</th>
                        {{-- <th>@lang('models/consumableSpares.fields.muscat_stk')</th>
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
                        <th>@lang('models/consumableSpares.fields.haima_stk')</th> --}}
                        <th>@lang('models/consumableSpares.fields.total_stk')</th>
                        <th colspan="3">@lang('crud.action')</th>
                    </tr>

                </thead>
                <tbody>

                    @if (!empty($consumableSpares))
                    @foreach($consumableSpares as $consumableSpare)
                    <tr x-data="{ opacity: {{ $loop->last == $loop->iteration }} }"
                        class="border-y text-center text-sm border-gray-200 odd:bg-gray-50 hover:bg-gray-100 [visibility:none]
                    "
                        :class="opacity ? 'opacity-100' : 'opacity-0'">

                        <td>{{ ($consumableSpares->currentPage() - 1) * $consumableSpares->perPage() + $loop->iteration }}</td>

                    <td>{{ $consumableSpare->old_bom ?? null }}</td>
                    <td>{{ $consumableSpare->new_bom ?? null }}</td>
                    <td>{{ $consumableSpare->description ?? null }}</td>
                    <td>{{ $consumableSpare->uom ?? null }}</td>
                    <td>{{ $consumableSpare->Important ?? null }}</td>
                    <td>{{ $consumableSpare->high_consumption ?? null }}</td>
                    {{-- <td>{{ $consumableSpare->muscat_stk ?? null }}</td>
                    <td>{{ $consumableSpare->sll_stk ?? null }}</td>
                    <td>{{ $consumableSpare->shr_stk ?? null }}</td>
                    <td>{{ $consumableSpare->nzw_stk ?? null }}</td>
                    <td>{{ $consumableSpare->ibra_stk ?? null }}</td>
                    <td>{{ $consumableSpare->ibri_stk ?? null }}</td>
                    <td>{{ $consumableSpare->adm_stk ?? null }}</td>
                    <td>{{ $consumableSpare->swq_stk ?? null }}</td>
                    <td>{{ $consumableSpare->dqm_stk ?? null }}</td>
                    <td>{{ $consumableSpare->sur_stk ?? null }}</td>
                    <td>{{ $consumableSpare->khasab_stk ?? null }}</td>
                    <td>{{ $consumableSpare->haima_stk ?? null }}</td> --}}

                    <td>{{ $consumableSpare->muscat_stk+$consumableSpare->sll_stk
                        +$consumableSpare->shr_stk
                        +$consumableSpare->nzw_stk
                        +$consumableSpare->ibra_stk
                        +$consumableSpare->ibri_stk
                        +$consumableSpare->adm_stk
                        +$consumableSpare->swq_stk
                        +$consumableSpare->dqm_stk
                        +$consumableSpare->sur_stk
                        +$consumableSpare->khasab_stk
                        +$consumableSpare->haima_stk ?? null }}</td>

                                <td class="flex justify-center flex-nowrap">
                                    {!! Form::open([
                                        'route' => [__('models/consumableSpares.route') . '.destroy', $consumableSpare->id],
                                        'method' => 'delete',
                                    ]) !!}
                                    <div class='btn-group'>
                                        <a href="{{ route(__('models/consumableSpares.route') . '.show', [$consumableSpare->id]) }}"
                                            class='btn btn-default btn-xs'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        @if (Auth::user()->isSuperAdmin() || Auth::user()->can(__('models/consumableSpares.route').'.edit'))
                                            <a href="{{ route(__('models/consumableSpares.route') . '.edit', [$consumableSpare->id]) }}"
                                                class='btn btn-success btn-xs'>
                                                <i class="far fa-edit"></i>
                                            </a>
                                            @if (Auth::user()->isSuperAdmin() || Auth::user()->can(__('models/consumableSpares.route').'.destroy'))
                                            {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'onclick' => "return confirm('Are you sure?')",
                                            ]) !!}
                                            @endif
                                        @endif
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        </div>
        <div class="border-t-2 border-slate-50 mt-3 flex justify-center p-2 w-full max-w-full">
            <div class=""> {{ $consumableSpares->links() }}
            </div>
        </div>
    </div>
