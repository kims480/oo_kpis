<div class="bg-white rounded-md shadow-md px-2">
    <form wire:submit.prevent="saveConsumable_move">
        @csrf
        <div class="py-4 px-2">
            <x-multi-select label="Site ID" itemId="site" :optionSelectedId="$selectedSite_id" optionValue="selectedSite_id"
                optionName="site_name" :optionSelectedName="$site_name" :optionList="$SitesList" itemSearch="siteSearch" />
            {{-- isEdit: {{$isEdit}}
                iscomplete: {{ $iscomplete}} --}}
            {{-- <label>Site ID</label> --}}

            {{-- <input wire:model="consumable_move.site_id" type="text" name="customer_name" class="focus:outline-none w-full border border-indigo-500 rounded-md p-1" value="{{ old('invoice.customer_name') }}" required>
            @error('consumable_move.site_id')
                <span class="text-red-500">
                    {{ $errors->first('consumable_move.site_id') }}
                </span>
            @enderror --}}
        </div>
        <div class="py-4 ">
            <label>WO <b class="text-red-600">*</b></label>
            <input wire:model="consumable_move.wo" type="text" name="customer_email"
                class="focus:outline-none w-full border border-indigo-500 rounded-md p-1"
                value="{{ old('invoice.customer_email') }}">
            @error('consumable_move.wo')
                <span class="text-red-500">
                    {{ $errors->first('consumable_move.wo') }}
                </span>
            @enderror
        </div>
        {{-- <div class="py-4 ">

            @error('consumable_move.wo')
                <span class="text-red-500">
                    {{ $errors->first('consumable_move.wo') }}
                </span>
            @enderror
        </div> --}}


        <div class="border-b border-gray-200 bg-neutral-50 py-2 px-2  flex flex-row justify-between items-baseline">
            <div class="font-extrabold">
                Consumables
            </div>
            <div class="flex flex-row">
                <button
                    class="hover:bg-slate-100 hover:text-green-700 py-1 px-2 bg-green-600 border border-indigo-800 rounded-md text-white focus:outline-none"
                    wire:click.prevent="addConsumable_spare"><i class="fas fa-plus"></i></button>

            </div>
        </div>
        <div class="flex flex-col overflow-x-auto bg-neutral-50 border-b border-gray-400">
            <div class="sm:-mx-4 lg:-mx-0">
                <div class="inline-block min-w-full py-2 sm:px-4 lg:px-4">
                    <div class="overflow-x-auto">
                        <!-- start header  -->
                        <div class="bg-gray-100 mx-auto border-gray-500 border rounded-sm text-gray-700 mb-0.5 h-30">
                            <div class="flex  p-3 border-l-8 border-sky-700">
                                <div class="basis-2/5 space-y-1 border-r-2 pr-3">
                                    <div class="text-sm leading-5 font-semibold">Consumable Spare</div>

                                </div>
                                <div class="basis-1/5 ">
                                    <div class=" ml-3 space-y-1 border-r-2 pr-3">
                                        <div class="text-base leading-6 font-normal">Stock Locator</div>

                                    </div>
                                </div>

                                <div class="basis-1/5  pr-3">
                                    <div class=" ml-3 space-y-1 border-r-2 pr-3">
                                        <div class="text-base leading-6 font-normal">Quantity</div>

                                    </div>

                                </div>
                                <div class="basis-1/5 space-y-1 border-r-2 pl-8 pr-3">
                                    <div class="text-sm leading-5 font-semibold">Action</div>

                                </div>
                            </div>
                        </div>
                        <!-- end -->
                        @foreach ($consumable_moveConsumable_spares as $index => $consumable_moveConsumable_spare)
                            <!-- start list -->
                            <div
                                class="{{ ($index%2==0) ? 'bg-gray-50' :'bg-gray-100'}}  mx-auto border-gray-200 border rounded-sm text-gray-700 mb-2 h-30">
                                <div class="flex items-stretch  px-3 py-1 border-l-8 {{ ($index%2==0) ? 'border-x-info-500' :'border-x-info-600'}}">

                                    <div class="basis-2/5 space-y-1 border-r-2 pr-3">
                                        <div class="text-sm leading-5 font-semibold">
                                            @if ($consumable_moveConsumable_spare['is_saved'])
                                                <input type="hidden"
                                                    name="consumable_moveConsumable_spares[{{ $index }}][consumable_spare_id]"
                                                    wire:model="consumable_moveConsumable_spares.{{ $index }}.consumable_spare_id" />
                                                @if ($consumable_moveConsumable_spare['consumable_spare_id'])
                                                    <div class="flex flex-col">
                                                        <b>{{ $consumable_moveConsumable_spare['old_bom'] }}</b>
                                                        <small> :
                                                            {{ $consumable_moveConsumable_spare['description'] }}</small>
                                                    </div>
                                                @endif
                                            @else
                                                <select
                                                    name="consumable_moveConsumable_spares[{{ $index }}][consumable_spare_id]"
                                                    class="focus:outline-none w-full border {{ $errors->has('consumable_moveConsumable_spares.' . $index) ? 'border-red-500' : 'border-indigo-500' }} rounded-md p-1"
                                                    wire:model="consumable_moveConsumable_spares.{{ $index }}.consumable_spare_id">
                                                    <option value="">-- choose Consumable --</option>
                                                    @foreach ($allConsumable_spares as $consumable_spare)
                                                        <option value="{{ $consumable_spare->id }}">
                                                            {{ $consumable_spare->old_bom }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                @if ($errors->has('consumable_moveConsumable_spares.' . $index))
                                                    <em class="text-sm text-red-500">
                                                        {{ $errors->first('consumable_moveConsumable_spares.' . $index) }}
                                                    </em>
                                                @endif
                                            @endif
                                        </div>

                                    </div>

                                    <div class="basis-1/5 ">
                                        <div class="h-full flex items-center justify-center  ml-3 space-y-1 border-r-2 pr-3">
                                            @if ($consumable_moveConsumable_spare['is_saved'])
                                                <input type="hidden"
                                                    name="consumable_moveConsumable_spares[{{ $index }}][stock]"
                                                    wire:model="consumable_moveConsumable_spares.{{ $index }}.stock" />
                                                {{ $consumable_moveConsumable_spare['stock'] }}
                                            @else
                                                {{-- <x-select.select_Search :index="$index"></x-select.select_Search> --}}
                                                <div class="text-base leading-6 font-normal">
                                                    <select data-te-select-init data-te-select-filter="true" data-te-select-option-height="52"
                                                    name="consumable_moveConsumable_spares[{{ $index }}][stock]"
                                                    wire:model="consumable_moveConsumable_spares.{{ $index }}.stock"
                                                        id="select1" class="searchSelection">
                                                        <option value="muscat_stk" data-te-select-secondary-text="2">
                                                            MCT
                                                        </option>
                                                        <option value="sll_stk" data-te-select-secondary-text="2">SLL
                                                        </option>
                                                        <option value="shr_stk" data-te-select-secondary-text="2">Sohar
                                                        </option>
                                                        <option value="ibra_stk" data-te-select-secondary-text="2">Ibra
                                                        </option>
                                                        <option value="nzw_stk" data-te-select-secondary-text="2">Nizwa
                                                        </option>
                                                        <option value="swq_stk" data-te-select-secondary-text="2">Swuiq
                                                        </option>
                                                        <option value="sur_stk" data-te-select-secondary-text="2">Sur
                                                        </option>
                                                        <option value="adm_stk" data-te-select-secondary-text="2">Adam
                                                        </option>
                                                        <option value="khasab_stk" data-te-select-secondary-text="2">KSB
                                                        </option>
                                                        <option value="dqm_stk" data-te-select-secondary-text="2">DQM
                                                        </option>
                                                        <option value="haima_stk" data-te-select-secondary-text="2">Haima
                                                        </option>
                                                        <option value="ibri_stk" data-te-select-secondary-text="2">Ibri
                                                        </option>
                                                    </select>
                                                </div>

                                            @endif
                                        </div>
                                    </div>

                                    <div class="basis-1/5 ">
                                        <div class="h-full flex items-center justify-center ml-3  space-y-1 border-r-2 pr-3">
                                            <div class="flex items-center justify-center center text-base leading-6 font-normal">
                                                @if ($consumable_moveConsumable_spare['is_saved'])
                                                    <input type="hidden"
                                                        name="consumable_moveConsumable_spares[{{ $index }}][quantity]"
                                                        wire:model="consumable_moveConsumable_spares.{{ $index }}.quantity" />
                                                    {{ $consumable_moveConsumable_spare['quantity'] }}
                                                @else
                                                    <input type="number" step="0.1" min="0" max="1000"
                                                        name="consumable_moveConsumable_spares[{{ $index }}][quantity]"
                                                        class="focus:outline-none w-full border border-indigo-500 rounded-md p-1"
                                                        wire:model="consumable_moveConsumable_spares.{{ $index }}.quantity" />
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="basis-1/5 h-full space-y-1 border-r-2 pl-8 pr-3">
                                        <div class="text-sm h-full flex items-center justify-center leading-5 font-semibold">
                                            @if ($consumable_moveConsumable_spare['is_saved'])
                                                <button
                                                    class="hover:bg-blue-600 py-1 px-2 bg-blue-500 border border-blue-600 rounded-md text-white focus:outline-none"
                                                    wire:click.prevent="editConsumable_spare({{ $index }})"><i
                                                        class="fas fa-edit"></i></button>
                                            @elseif($consumable_moveConsumable_spare['consumable_spare_id'])
                                                <button
                                                    class="hover:bg-green-600 py-1 px-2 bg-green-500 border border-green-600 rounded-md text-white focus:outline-none"
                                                    wire:click.prevent="saveConsumable_spare({{ $index }})"><i
                                                        class="fas fa-save"></i></button>
                                            @endif
                                            <button
                                                class="hover:bg-red-600 ml-1 py-1 px-2 bg-red-500 border border-red-600 rounded-md text-white focus:outline-none"
                                                wire:click.prevent="removeConsumable_spare({{ $index }})"><i
                                                    class="fas fa-trash"></i></button>
                                        </div>
                                    </div>

                                </div>

                                <!-- end -->
                            </div>
                        @endforeach

                        @error('consumable_moveConsumable_spares')
                            <span class="text-red-500">
                                {{ $errors->first('consumable_moveConsumable_spares') }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end  py-1 ">
            <input
                class="hover:bg-green-800 disabled:bg-slate-50 disabled:text-gray-600 cursor-pointer py-1 px-3 bg-green-600 border border-indigo-600 rounded-md text-white focus:outline-none"
                type="submit" value="Submit" {{ $isEdit && $iscomplete ? '' : 'disabled' }}>
        </div>
    </form>
    @push('scripts')
        <script>


            // singleSelectInstance.open();
        </script>
    @endpush


</div>
