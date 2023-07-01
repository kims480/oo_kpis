<table class="min-w-full text-left text-sm font-light bg-white  ">
    <thead class="border-b bg-sky-300 font-medium dark:border-neutral-500 dark:text-neutral-800">
        <tr>
            <th scope="col" class="px-4 py-2">Consumable Spare</th>
            <th scope="col" class="px-4 py-2">Stock Locator</th>
            <th scope="col" class="px-4 py-2">Quantity</th>
            <th scope="col" class="px-4 py-2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($consumable_moveConsumable_spares as $index => $consumable_moveConsumable_spare)
            <tr class="border-b bg-neutral-50  dark:border-neutral-200 py-4 border-spacing-y-7">
                <td class="whitespace-nowrap px-4 py-2 font-medium">
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
                        {{-- <x-multi-select label="Spare BOM" itemId="spare" :optionSelectedId="$consumable_spare_id" optionValue="selectedSpare_id"
                optionName="consumable_moveConsumable_spares[{{$index}}][consumable_spare_id]" :optionSelectedName="$consumable_moveConsumable_spares[{{$index}}][old_bom]" :optionList="$allConsumable_spares" itemSearch="spareSearch" /> --}}
                        <select name="consumable_moveConsumable_spares[{{ $index }}][consumable_spare_id]"
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
                </td>
                <td>
                    <div class="py-4 ">
                        <select data-te-select-init data-te-select-filter="true" data-te-select-option-height="52"
                            name="selectx" id="select1">
                            <option value="muscat_stk" data-te-select-secondary-text="2">
                                MCT<span
                                    class="ml-2 inline-block whitespace-nowrap rounded-[0.27rem] bg-danger-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-danger-700">7</span>
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
                </td>
                <td class="whitespace-nowrap px-6 py-4">
                    @if ($consumable_moveConsumable_spare['is_saved'])
                        <input type="hidden" name="consumable_moveConsumable_spares[{{ $index }}][quantity]"
                            wire:model="consumable_moveConsumable_spares.{{ $index }}.quantity" />
                        {{ $consumable_moveConsumable_spare['quantity'] }}
                    @else
                        <input type="number" step="0.1" min="0" max="1000"
                            name="consumable_moveConsumable_spares[{{ $index }}][quantity]"
                            class="focus:outline-none w-full border border-indigo-500 rounded-md p-1"
                            wire:model="consumable_moveConsumable_spares.{{ $index }}.quantity" />
                    @endif
                </td>
                <td class="whitespace-nowrap px-6 py-4">
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
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
