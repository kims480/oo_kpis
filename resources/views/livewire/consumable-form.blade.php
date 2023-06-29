<div class="bg-blue-50 rounded-md shadow-md px-2">
    <form wire:submit.prevent="saveConsumable_move">
        @csrf
        <div class="py-4 px-2">
            <x-multi-select label="Site ID" itemId="site" :optionSelectedId="$selectedSite_id" optionValue="selectedSite_id"
                optionName="site_name" :optionSelectedName="$site_name" :optionList="$SitesList" itemSearch="siteSearch" />
            {{-- <label>Site ID</label> --}}

            {{-- <input wire:model="consumable_move.site_id" type="text" name="customer_name" class="focus:outline-none w-full border border-indigo-500 rounded-md p-1" value="{{ old('invoice.customer_name') }}" required>
            @error('consumable_move.site_id')
                <span class="text-red-500">
                    {{ $errors->first('consumable_move.site_id') }}
                </span>
            @enderror --}}
        </div>
        <div class="py-4 ">
            <label>WO</label>
            <input wire:model="consumable_move.wo" type="text" name="customer_email"
                class="focus:outline-none w-full border border-indigo-500 rounded-md p-1"
                value="{{ old('invoice.customer_email') }}">
            @error('consumable_move.wo')
                <span class="text-red-500">
                    {{ $errors->first('consumable_move.wo') }}
                </span>
            @enderror
        </div>


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
                        <table class="min-w-full text-left text-sm font-light">
                            <thead
                                class="border-b bg-neutral-400 font-medium dark:border-neutral-500 dark:text-neutral-800">
                                <tr>
                                    <th scope="col" class="px-4 py-2">Consumable Spare</th>
                                    <th scope="col" class="px-4 py-2">Quantity</th>
                                    <th scope="col" class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($consumable_moveConsumable_spares as $index => $consumable_moveConsumable_spare)
                                    <tr class="border-b bg-neutral-50 dark:border-neutral-200">
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
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            @if ($consumable_moveConsumable_spare['is_saved'])
                                                <input type="hidden"
                                                    name="consumable_moveConsumable_spares[{{ $index }}][quantity]"
                                                    wire:model="consumable_moveConsumable_spares.{{ $index }}.quantity" />
                                                {{ $consumable_moveConsumable_spare['quantity'] }}
                                            @else
                                                <input type="number"
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
                    </div>
                    @error('consumable_moveConsumable_spares')
                    <span class="text-red-500">
                        {{ $errors->first('consumable_moveConsumable_spares') }}
                    </span>
                @enderror
                </div>
            </div>
        </div>


        <div class="flex justify-end  py-1 bg-blue-50">
            <input
                class="hover:bg-green-800 cursor-pointer py-1 px-3 bg-green-600 border border-indigo-600 rounded-md text-white focus:outline-none"
                type="submit" value="Submit">
        </div>
    </form>
</div>
