<div>
    <form wire:submit.prevent="saveConsumable_move">
        @csrf
        <div>
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
        <div>
            <label>WO</label>
            <input wire:model="consumable_move.wo" type="text" name="customer_email" class="focus:outline-none w-full border border-indigo-500 rounded-md p-1" value="{{ old('invoice.customer_email') }}">
            @error('consumable_move.wo')
                <span class="text-red-500">
                    {{ $errors->first('consumable_move.wo') }}
                </span>
            @enderror
        </div>

        <div class="mt-4 border border-gray-300 rounded-md">
            <div class="border-b border-gray-300  p-5">
                Consumables
            </div>

            <div class="p-5">
                <table class="table table-auto w-full" id="products_table">
                    <thead>
                    <tr>
                        <th class="text-left">Consumable Spare</th>
                        <th class="text-left" width="150">Quantity</th>
                        <th class="text-left" width="150">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($consumable_moveConsumable_spares as $index => $consumable_moveConsumable_spare)
                        <tr>
                            <td class="p-1">
                                @if($consumable_moveConsumable_spare['is_saved'])
                                    <input type="hidden" name="consumable_moveConsumable_spares[{{$index}}][consumable_spare_id]" wire:model="consumable_moveConsumable_spares.{{$index}}.consumable_spare_id"/>
                                    @if($consumable_moveConsumable_spare['consumable_spare_id'])
                                        {{ $consumable_moveConsumable_spare['old_bom'] }}

                                    @endif
                                @else
                                    <select name="consumable_moveConsumable_spares[{{$index}}][consumable_spare_id]" class="focus:outline-none w-full border {{ $errors->has('consumable_moveConsumable_spares.' . $index) ? 'border-red-500' : 'border-indigo-500' }} rounded-md p-1" wire:model="consumable_moveConsumable_spares.{{$index}}.consumable_spare_id">
                                        <option value="">-- choose Consumable --</option>
                                        @foreach ($allConsumable_spares as $consumable_spare)
                                            <option value="{{ $consumable_spare->id }}">
                                                {{ $consumable_spare->old_bom }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('consumable_moveConsumable_spares.' . $index))
                                        <em class="text-sm text-red-500">
                                            {{ $errors->first('consumable_moveConsumable_spares.' . $index) }}
                                        </em>
                                    @endif
                                @endif
                            </td>
                            <td class="p-1">
                                @if($consumable_moveConsumable_spare['is_saved'])
                                    <input type="hidden" name="consumable_moveConsumable_spares[{{$index}}][quantity]" wire:model="consumable_moveConsumable_spares.{{$index}}.quantity"/>
                                    {{ $consumable_moveConsumable_spare['quantity'] }}
                                @else
                                    <input type="number" name="consumable_moveConsumable_spares[{{$index}}][quantity]" class="focus:outline-none w-full border border-indigo-500 rounded-md p-1" wire:model="consumable_moveConsumable_spares.{{$index}}.quantity"/>
                                @endif
                            </td>
                            <td class="p-1">
                                @if($consumable_moveConsumable_spare['is_saved'])
                                    <button class="hover:bg-blue-600 p-1 bg-blue-500 border border-blue-600 rounded-md text-white focus:outline-none" wire:click.prevent="editConsumable_spare({{$index}})">Edit</button>
                                @elseif($consumable_moveConsumable_spare['consumable_spare_id'])
                                    <button class="hover:bg-green-600 p-1 bg-green-500 border border-green-600 rounded-md text-white focus:outline-none" wire:click.prevent="saveConsumable_spare({{$index}})">Save</button>
                                @endif
                                <button class="hover:bg-red-600 ml-1 p-1 bg-red-500 border border-red-600 rounded-md text-white focus:outline-none" wire:click.prevent="removeConsumable_spare({{$index}})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="mt-3">
                    <button class="hover:bg-indigo-600 p-1 bg-indigo-500 border border-indigo-600 rounded-md text-white focus:outline-none" wire:click.prevent="addConsumable_spare">+ Add Product</button>
                </div>


            </div>
        </div>
        <br/>
        <div>
            <input class="hover:bg-indigo-600 cursor-pointer p-1 bg-indigo-500 border border-indigo-600 rounded-md text-white focus:outline-none" type="submit" value="Save Invoice">
        </div>
    </form>
</div>
