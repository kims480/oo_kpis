<div class="form-groups flex flex-col ">
    <label for="{{ $id }}" class="col-form-label text-md-right whitespace-nowrap px-1">{{ $label }}</label>
    <select wire:model="{{$selectedItem}}" id="{{$id}}"  class="form-control block text-sm ">
        <option value="" class="text-sm text-gray-500"> -Choose {{$label}}- </option>
        @foreach ($itemsList as $item_id => $itemName)
            <option value="{{ $itemName->id }}" class="text-sm text-blue-800 border-b border-solid border-blue-400">
                {{ $itemName->name }}
            </option>
        @endforeach
    </select>
    @error($selectedItem)
    <x-validation-error >
        {{$message}}
    </x-validation-error>
    @enderror
</div>
