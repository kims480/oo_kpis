<div>
    <div class="form-group row">
        <label for="{{ $parentLabel }}" class="col-md-4 col-form-label text-md-right">{{ $parentLabel }}</label>

        <div class="col-md-6">
            <select :wire:model="parentValue" name="{{ $parentInputName }}" class="form-control" required>
                <option value="">-- choose Governate --</option>
                @foreach ($parents as $parent)
                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="{{ $childLabel }}" class="col-md-4 col-form-label text-md-right">{{ $childLabel }}</label>

        <div class="col-md-6">
            <select wire:model="childValue" name="{{ $childInputName }}" class="form-control" required>
                @if ($children->count() == 0)
                    <option value="">-- choose {{ strtolower($parentLabel) }} first --</option>
                @endif
                @foreach ($children as $child)
                    <option value="{{ $child->id }}">{{ $child->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

</div>
