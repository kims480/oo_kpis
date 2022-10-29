<div class="form-groups relative flex flex-col" x-data="{ openItemSelect: false }">
    <label for="{{ $itemId }}">{{ $label }} <span style="color:red;">*</span> {{ $optionSelectedId }}
        {{-- {{ ${$optionName} == null?'_' : $optionSelectedName }} --}}
    </label>
    {!! Form::hidden('site_name_id', $optionSelectedId) !!}
    <input type="text" @click="$focus.within($refs.searchBox).first()" @click.prevent="openItemSelect=!openItemSelect;"
        class="selected relative invalid:border-pink-500
                invalid:text-pink-600 py-1.5 px-2 border border-slate-400
                cursor-pointer bg-slate-100 text-sm font-semibold text-sky-900 rounded-lg"
        placeholder="{{$optionSelectedName ?? $label }}" wire:model="{{ $optionName }}" name="{{ $optionName }}"  readonly>

    <span @click="$focus.within($refs.searchBox).first();" @click.prevent="openItemSelect=!openItemSelect;"
        class="absolute content-[''] bg-contain bg-[url('/img/soccer.svg')]
    bg-no-repeat cursor-pointer h-full w-4 right-3 top-8 after:transition-all"></span>

    <div class="select-box relative flex flex-col" id="{{ $itemId }}" x-show="openItemSelect"
        @click.outside="openItemSelect = false">
        <div class="options-container absolute -top-8 z-50 order-1 max-h-60 overflow-y-scroll mt-9
        bg-slate-100 text-slate-800 w-full scrollbar-thin scrollbar-track-slate-200
        scrollbar-thumb-slate-600  rounded-lg active hidden "
            x-ref="optionsContainer" :class="{ 'hidden': !openItemSelect, 'active': openItemSelect }"
            @keydown.down="$focus.wrap().next()" @keydown.up="$focus.wrap().previous()">
            <div class="option mb-1" tabindex="0">
                <input type="radio" class="opacity-0" />
                <label class="text-sm">{{ $label }}</label>
            </div>
            @foreach ($optionList as $id => $item)
                @if ($optionSelectedId == $id)
                <?php $optionSelectedName = $item; ?>
                @endif
                {{-- <div class="option" @updateSearch.window="showOption=checkIndexOf({textA:'{{$site}}',textB:$event.detail.typed})" :class="{'hidden':!showOption}"> --}}
                <div class="option py-1 px-2 border border-slate-300 flex
                            text-sm font-light cursor-pointer hover:bg-sky-900
                            hover:text-slate-200 hover:font-semibold
                            {{ $optionSelectedId == $id ? 'bg-slate-800 border-0 text-slate-50 border-l-8 border-red-700' : '' }}"
                    tabindex="{{ $loop->iteration }}" class="focus:bg-orange-300" @click="openItemSelect=false"
                    wire:click="$set('{{ $optionName }}','{{ $item }}');{{-- $set('{{ $optionValue }}',{{ $id }}); --}}">
                    <input type="radio" class="radio opacity-0 {{ $itemId }}-option" {{-- wire:click.stop="$set('{{ $optionValue }}',{{ $id }})" --}}
                        wire:model="{{ $optionValue }}" id="{{ $itemId }}-{{ $id }}"
                        value="{{ $id }}" />
                    <label class="cursor-pointer flex-grow " {{-- x-cloak --}}
                        for="{{ $itemId }}-{{ $id }}">{{ $item }}</label>
                </div>
            @endforeach
        </div>



        <div class="search-box relative w-full " x-show="openItemSelect" x-ref="searchBox" x-trap="openItemSelect"
            {{-- x-data="{fff:''}" x-init="$watch('fff', value => console.log(value))" --}}>
            <input type="text"
                class="w-full p-1 h-8 top-0 font-sans font-medium uppercase text-sm absolute rounded-t-lg rounded-b-none z-50 pointer-events-none transition-all focus:outline-none"
                @keydown.down="$focus.within($refs.optionsContainer).first()"
                wire:model.debounce300ms="{{ $itemSearch }}" {{-- @keyup="$dispatch('updateSearch',{typed:$event.target.value}),fff=$event.target.value" --}} placeholder="Start Typing..." />
        </div>

    </div>
    @error($optionValue)
    <x-validation-error class="{{$itemId}}-invalid">
        {{$message}}
    </x-validation-error>
    @enderror
    @once
        @include('layouts.app.search_drop')
    @endonce
    @push('page_scripts')
        <script>
            new SearchDrop('#{{ $itemId }}');
        </script>
    @endpush


</div>
