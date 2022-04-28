<div class="form-groups">
    <label for="{{ $itemId }}">{{ $label }} <span style="color:red;">*</span></label>

    <div class="select-box " id="{{ $itemId }}" x-data="{ siteSelect: false }" @click.prevent="siteSelect=!siteSelect;"
        @click.outside="siteSelect = false">
        <div class="options-container active hidden " :class="{ 'hidden': !siteSelect, 'active': siteSelect }">
            <div class="option">
                {{-- <input type="radio" class="radio" id="" /> --}}
                <label>{{ $label }}</label>
            </div>
            @foreach ($optionList as $id => $item)
                @if ($optionSelectedId == $id)
                    <?php $optionSelectedName = $item; ?>
                @endif
                {{-- <div class="option" @updateSearch.window="showOption=checkIndexOf({textA:'{{$site}}',textB:$event.detail.typed})" :class="{'hidden':!showOption}"> --}}
                <div class="option"
                    wire:click="$set('{{ $optionValue }}',{{ $id }});$set('{{ $optionName }}',{{ $item }});">
                    <input type="radio" class="radio"
                        wire:click.stop="$set('{{ $optionValue }}',{{ $id }})"
                        id="{{ $itemId }}-{{ $id }}" value="{{ $id }}"
                        name="optionValue" />
                    <label for="{{ $itemId }}-{{ $id }}">{{ $item }}</label>
                </div>
            @endforeach
        </div>

        <div class="selected">
            {{ empty($optionSelectedName) ? $label : $optionSelectedName }}
        </div>

        <div class="search-box" x-trap="siteSelect" {{-- x-data="{fff:''}" x-init="$watch('fff', value => console.log(value))" --}}>
            <input type="text" wire:model.debounce300ms="{{ $itemSearch }}" {{-- @keyup="$dispatch('updateSearch',{typed:$event.target.value}),fff=$event.target.value" --}}
                placeholder="Start Typing..." />
        </div>
    </div>

    @once
        @include('layouts.app.search_drop')
    @endonce
    @push('page_scripts')
    <script>
            new SearchDrop('#{{ $itemId }}');
        </script>
    @endpush
</div>
