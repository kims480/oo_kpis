<div class=" flex  w-full content-center justify-center py-4 px-4">
    <div class=" flex flex-col w-full justify-center content-center">
        {{-- @dd($employee[0]); --}}
        <div class="flex p-2 mb-4  content-center justify-center border-b-2">

            {!! Form::text('search', null, [
                'class' => 'text-base  rounded  p-1 w-3/4    ',
                'placeholder' => __('models/employees.fields.civil_id'),
                'wire:model.debounce.700ms' => 'search',
            ]) !!}

            <button wire:click="getCivilId"
                class="p-2 transition bg-indigo-300 text-indigo-900 hover:font-bold hover:bg-indigo-700 hover:text-white">
                Check
            </button>

        </div>
        <div class=" flex w-full  flex-col content-center justify-center    gap-4 pb-6">
            <div class=" flex flex-nowrap content-center justify-center ">
                <div>
                    <p class="py-1 rounded-l-lg w-40 bg-slate-500 text-white text-right px-2">
                        {{ __('models/employees.fields.civil_id') }}</p>
                </div>
                <div>
                    <p class="py-1 rounded-r-lg min-w-[15rem]  min-h-[2rem] bg-slate-200 text-slate-900 text-left  px-2">
                        {{ $employee[0]['civil_id'] ?? '_' }}
                    </p>
                </div>
            </div>
            <div class=" flex flex-nowrap content-center justify-center ">

                <div>
                    <p class="rounded-l-lg py-1 w-40  bg-slate-500 text-white text-right px-2">
                        {{ __('models/employees.fields.hr_code') }}</p>
                </div>
                <div>
                    <p
                        class="rounded-r-lg min-w-[15rem]  py-1 min-h-[2rem]   bg-slate-200 text-slate-900 text-left  px-2">
                        {{ $employee[0]['hr_code'] ?? '_' }}
                    </p>
                </div>
            </div>
            <div class=" flex flex-nowrap content-center justify-center ">
                <div>
                    <p class="rounded-l-lg py-1 w-40  bg-slate-500 text-white text-right px-2">
                        {{ __('models/employees.fields.name') }}</p>
                </div>
                <div>
                    <p
                        class="rounded-r-lg min-w-[15rem]  py-1 min-h-[2rem]  bg-slate-200 text-slate-900 text-left  px-2">
                        {{ $employee[0]['first_name'] ?? '_' }}
                    </p>
                </div>
            </div>
            <div class=" flex flex-nowrap  content-center justify-center">
                <div>
                    <p class="rounded-l-lg py-1 w-40   bg-slate-500 text-white text-right px-2">
                        {{ __('models/employees.fields.email') }}
                    </p>
                </div>
                <div>
                    <p
                        class="rounded-r-lg  min-w-[15rem]  max-w-[18rem] min-h-[2rem] py-1  bg-slate-200 text-slate-900 text-left  px-2">
                        {{ $employee[0]['email'] ?? '_' }}</p>
                </div>
            </div>
            <div class=" flex flex-nowrap content-center justify-center ">
                <div>
                    <p class="rounded-l-lg py-1 w-40  bg-slate-500 text-white text-right px-2">
                        {{ __('models/employees.fields.phone') }}
                    </p>
                </div>
                <div>
                    <p
                        class="rounded-r-lg min-w-[15rem]  py-1 min-h-[2rem] bg-slate-200 text-slate-900 text-left  px-2">
                        {{ $employee[0]['phone'] ?? '_' }}
                    </p>
                </div>
            </div>
            <div class=" flex flex-nowrap content-center justify-center ">
                <div>
                    <p class="rounded-l-lg py-1 w-40  bg-slate-500 text-white text-right px-2">
                        {{ __('models/employees.fields.contract_confirmed') }}
                    </p>
                </div>
                <div>
                    <p
                        class="rounded-r-lg min-w-[15rem]  py-1 min-h-[2rem] bg-slate-200 text-slate-900 text-left  px-2">
                        {{ $employee[0]['contract_confirmed']!=null ? ($employee[0]['contract_confirmed']?'Yes':'No') :'No'  }}
                    </p>
                </div>
            </div>

        </div>

        <div class="w-full self-center bg-white py-1 "></div>

        <!-- TT Update -->
        <div class="flex  w-full  pt-4 justify-center content-center">
            <div class="flex w-3/4 gap-4 justify-center content-center">
                <div class="flex flex-col w-1/2 mt-4 content-end justify-end">

                    <label for="contract_confirmation">{{ __('models/employees.fields.contract_confirmed') }}</label>

                    {!! Form::select('contract_confirmed', [null=>'Please confirm',0 => 'No', 1 => 'Yes'], null, [
                        'class' => 'text-base   rounded  p-1 ',
                        'wire:model.debounce' => 'contract_confirmed',
                    ]) !!}
                </div>
                <div class="flex  mt-4 ">
                    <button wire:click="storeContractConfirmed"
                        class="p-3 transition text-base rounded bg-green-300 text-green-900 hover:font-bold hover:bg-green-700 hover:text-white">
                        Update
                    </button>
                </div>
            </div>
        </div>
        <div class="flex w-full flex-col">

        </div>
    </div>
</div>
