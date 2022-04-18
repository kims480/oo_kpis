
<div class="col-12 col-md-12 d-flex flex-wrap p-0">
    <div class="form-group col-md-6 col-sm-6 ">
        <label for="{{ $parentLabel }}" class="col-form-label text-md-right">{{ $parentLabel }}</label>

        <div class="">
            <select wire:model="parentValue" name="{{ $parentInputName }}" class="form-control" required>
                <option value="1">-- choose Governate --</option>
                @foreach ($parents as $parent)
                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group col-md-6 col-sm-6 ">
        <label for="{{ $childLabel }}" class="col-form-label text-md-right">{{ $childLabel }}</label>

        <div class="">
            <select wire:model="childValue" name="{{ $childInputName }}" class="form-control" required>
                @if ($children->count() == 0)
                    <option value="0">-- choose {{ strtolower($parentLabel) }} first --</option>
                @endif
                @foreach ($children as $child)
                    <option value="{{ $child->id }}">{{ $child->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
