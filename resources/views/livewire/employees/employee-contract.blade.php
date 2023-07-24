<div class="card w-full p-0" x-data={filtersOn:false}>
    <div class="card-body p-0 relative w-full ">
        <div class="py-1 bg-gray-100 w-full flex flex-col gap-4 border-b-2 border-amber-500 border-solid mb-2">
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
            <div class="options flex gap-4 flex-col justify-between pb-2 items-center border-b-2 border-slate-800">
                @can(__('models/batteryAdds.singular') . '.upload')
                    <div class="form w-full p-2">
                        <form class="flex flex-nowrap mb-1" wire:submit.prevent="import">
                            @csrf
                            <input type="file" wire:model="your_file">

                            @error('your_file')
                                <span class="error">{{ $message }}</span>
                            @enderror

                            <button class="p-1 rounded shadow-sm bg-gray-50 text-slate-900 text-sm" type="submit"
                                wire:loading.attr="disabled">Upload Sites</button>
                        </form>

                    </div>
                @endcan

                <div
                    class="form-check w-full flex xs:flex-col sm:w-full sm:flex-row flex-nowrap   align-middle items-center  form-switch  ">
                    <div class="form-check flex xs:flex-col sm:w-full xs:w-full md:flex-row  form-switch gap-4 px-2 sx:items-start sm:justify-start xs:content-start xs:justify-start">
                        <div class="form-groups sm:w-full md:w-auto  flex flex-nowrap gap-2 items-center ">
                            <label for="snag" class="col-form-label text-slate-600 font-bold w-20 text-md-right">Results:
                            </label>
                            <select wire:model="perPage" class="form-control block w-20">
                                <option value="5">5</option>
                                <option value="10" selected>10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>

                        </div>
                        <div class="form-groups   items-center flex flex-nowrap gap-2 ">
                            <label class="form-check-label inline-block text-gray-600 font-bold w-20"
                            for="flexSwitchCheckChecked">Filter:</label>
                            <input
                                class="form-check-input appearance-none w-9 rounded-full  h-5  bg-no-repeat bg-contain bg-indigo-600 focus:outline-none cursor-pointer shadow-sm"
                                type="checkbox" role="switch" id="flexSwitchCheckChecked"
                                @click="filtersOn=!filtersOn">

                        </div>
                    </div>
                    <div class="flex xs:flex-col  xs:w-full md:flex-row  sm:ml-0 md:ml-auto ml-auto sm:w-full sm:items-end sm:justify-end px-2 gap-2">
                        {{-- @can(__('models/employees.route') . '.create')
                            <a class="transition w-28 text-center  text-amber-800 bg-amber-50 ease-in-out btn btn-default relative has-tooltips text-sm hover:bg-cyan-900 hover:text-slate-50"
                                href="{{ route(__('models/employees.route') . '.create') }}">
                                @lang('crud.add_new')
                            </a>
                        @endcan --}}
                        {{-- @can(__('models/employees.export')) --}}
                            <button wire:click.prevent="export" x-data={isOpen:false}
                                class="transition w-28 text-amber-800 bg-amber-50 ease-in-out btn btn-default relative has-tooltips text-sm "
                                data-mdb-ripple="true" @mouseover="isOpen=true" @mouseover.away="isOpen=false">
                                <x-tooltip message='Export excel' />
                                <i class="far fa-file-excel text-amber-800 "></i> Export
                            </button>
                        {{-- @endcan --}}
                    </div>

                </div>
            </div>
        </div>
        <div class="scrollbar-thin scrollbar-thumb-slate-700 scrollbar-track-slate-300">
            <table class=" w-full table-auto mb-2">


                <thead>
                    <tr x-show="filtersOn">
                        <th>
                            {{-- {!! Form::text('id', null, ['class' => 'text-sm border-0 rounded-none border-b-2 p-1 ', 'placeholder' => __('models/sites.fields.id'), 'wire:model' => '']) !!} --}}

                        </th>
                        <th class="py-1 px-2   text-center"> {!! Form::select('contract_confirmed', [0=>'Pending',1=>'Completed'],null, [
                            'class' => 'text-sm  border-0 rounded-none border-b-2 py-1 ',

                            'wire:model.debounce' => 'contract_confirmed',
                        ]) !!}
                        </th>
                        <th class="py-1 px-2   text-center"> {!! Form::text('civil_id', null, [
                            'class' => 'text-sm  border-0 rounded-none border-b-2 p-1 ',
                            'placeholder' => __('models/employees.fields.civil_id'),
                            'wire:model.debounce' => 'civil_id',
                        ]) !!}
                        </th>
                        <th class="py-1 px-2  text-center">
                            {!! Form::text('first_name', null, [
                                'class' => 'text-sm border-0 rounded-none border-b-2 p-1 ',
                                'placeholder' => __('models/employees.fields.first_name'),
                                'wire:model.debounce' => 'first_name',
                            ]) !!}
                        </th>
                        <th class="py-1 px-2  text-center">
                            {!! Form::text('hr_code', null, [
                                'class' => 'text-sm  border-0 rounded-none border-b-2 p-1 ',
                                'placeholder' => __('models/employees.fields.hr_code'),
                                'wire:model.debounce' => 'hr_code',
                            ]) !!}
                        </th>
                        <th class="py-1 px-2  text-center">
                            {!! Form::text('email', null, [
                                'class' => 'text-sm  border-0  rounded-none border-b-2 p-1 ',
                                'placeholder' => __('models/employees.fields.email'),
                                'wire:model.debounce' => 'email',
                            ]) !!}
                        </th>
                        <th class="py-1 px-2   text-center"> {!! Form::text('phone', null, [
                            'class' => 'text-sm  border-0 rounded-none border-b-2 p-1 ',
                            'placeholder' => __('models/employees.fields.phone'),
                            'wire:model.debounce' => 'phone',
                        ]) !!}
                        </th>


                        <th>
                            {{-- {!! Form::text('address', null, ['class' => 'text-sm border-0 rounded-none border-b-2 p-1 ', 'placeholder' => __('models/sites.fields.address'), 'wire:model' => '']) !!} --}}
                        </th>

                    </tr>
                    <tr>
                    <tr class="bg-gray-700 text-slate-50 uppercase text-sm leading-normal">

                        <th class="py-1 px-1 text-center"> {!! Form::checkbox('check-employees', 'all') !!} </th>
                        <th class="py-1 px-2 text-center">@lang('models/employees.fields.contract_confirmed')</th>
                        <th class="py-1 px-2 text-center">@lang('models/employees.fields.civil_id')</th>

                        <th class="py-1 px-2 text-center">@lang('models/employees.fields.first_name')</th>
                        <th class="py-1 px-2 text-left">@lang('models/employees.fields.hr_code')</th>
                        <th class="py-1 px-2 text-center">@lang('models/employees.fields.email')</th>
                        <th class="py-1 px-2 w-40  text-center">@lang('models/employees.fields.phone')</th>

                        <th class="py-1 px-2 text-center" colspan="2">@lang('crud.action')</th>



                    </tr>
                    </tr>
                </thead>
                <tbody>
                    @isset($employees)
                        @foreach ($employees as $employee)
                            <tr x-data="{ opacity: {{ $loop->last == $loop->iteration }} }"
                                class="border-y text-center text-sm border-gray-200 odd:bg-gray-50 hover:bg-gray-100 [visibility:none]
                            "
                                :class="opacity ? 'opacity-100' : 'opacity-0'">
                                <td class="py-1 px-1 text-center">{!! Form::checkbox('check-' . $employee->id, $employee->id) !!} </span></td>
                                <td class="py-1 px-2 text-center">
                                    {{-- @dd($employee->status) --}}
                                    <span class="{{ $employee->contract_confirmed?'completed':'pending' }}">{{ $employee->contract_confirmed?'completed':'pending' }} </span>
                                </td>
                                <td class="py-1 px-2 text-center"><span
                                        class="w-40 truncate hover:text-clip font-semibold">{{ $employee->civil_id }}</span>
                                </td>
                                <td ؤlass="py-1 px-2 text-left">{{ $employee->first_name }}</td>
                                <td class="py-1 px-2 text-left ">
                                    <p class="w-40 truncate hover:text-clip">{{ $employee->hr_code }}</p>
                                </td>
                                <td class="py-1 px-2 text-left w-40  ">
                                    <p class="w-40 truncate hover:text-clip">{{ $employee->email }}</p>
                                </td>
                                <td class="py-1 px-2 text-center ">
                                    <p class="w-40 truncate hover:text-clip">{{ $employee->phone }}</p>
                                </td>

                                <td class="py-1 px-2 text-center " colspan="2">
                                    {!! Form::open(['route' => ['employees.destroy', $employee->id], 'method' => 'delete']) !!}
                                    @csrf
                                    <div class='btn-group flex flex-nowrap'>
                                        <a href="{{ route('employees.show', [$employee->id]) }}"
                                            class='btn btn-default btn-xs'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        @can('employees.edit')
                                            <a href="{{ route('employees.edit', [$employee->id]) }}"
                                                class='btn btn-default btn-xs'>
                                                <i class="far fa-edit"></i>
                                            </a>
                                        @endcan
                                        @hasanyrole('DELETE_TT|supper-admin')
                                            {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'onclick' => "return confirm('Are you sure?')",
                                            ]) !!}
                                        @endhasanyrole
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @endisset


                </tbody>
            </table>

        </div>
        <div class="border-t-2 border-slate-50 mt-3 flex justify-center p-2 w-full max-w-full">
            <div class=""> {{ $employees->links() }}
            </div>
        </div>
    </div>
</div>
