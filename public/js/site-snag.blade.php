<div>
    @push('page_scripts')
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    @endpush
    <div class="container">
        <form wire:submit.prevent="storeSiteSnag" class="">
            <div class="md:grid  md:grid-cols-3 md:grid-rows-2 md:gap-2 flex flex-wrap">
                <div class="">
                    <label for="seachable-select">Site ID</label>
                    <select id="seachable-select" wire:model="site_s">
                        <option data-display="Select" disabled>Site ID</option>
                        @foreach ($SitesList as $id => $site)
                            <option value="{{ $id }}"> {{ $site }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- Select Site ID --}}
                {{-- @livewire('multi-select', ['optionList' => $SitesList,"label"=>"Site ID"]) --}}
                {{-- <x-multi-select label="Site ID" optionList="{!!$SitesList!!}" x-data="{data: @entangle('SitesList')}"></x-multi-select> --}}
                {{-- <div class="form-groups ">
                    <label for="snag">Site ID <span class="text-red-700">*</span></label>
                    <input type="text" @click.away="checkSiteId" list="browsers" class="form-control control-sm "
                        wire:model="selectedSiteS" name="snag">
                    <datalist id="browsers" class=" absolute bg-slate-400 text-blue-800">
                        @foreach ($SitesList as $id => $site)
                            <option data-site-id="{{ $id }}"
                                wire:click.prevent="updatedSelectedSiteS(this.getAttribute('data-site-id'))"
                                value="{{ $id . '-' . $site }}"></option>
                        @endforeach
                    </datalist>
                </div> --}}
                {{-- <div class="form-groups col-sm-4">
                        <div class="select-box" id="site" wire:click="toggleSelectSite()">
                            <div class="options-container {{$siteOptionListActive?'active':''}}">
                                @foreach ($SitesList as $id => $site)
                                    <div class="option {{$siteOptionListActive??'active'}}">
                                        <input type="radio" wire:model="selectedSiteS" wire:click="toggleSelectSite()"  class="radio"
                                            id="site-{{ $id }}" value="{{ $id }}" />
                                        <label for="site-{{ $id }}"> {{ $site }} </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="selected">
                                @if ($selectedSiteS)
                                    {!!$site_name !!}
                                @else
                                    Select Site ID
                                @endif
                            </div>
                            <div class="search-box">
                                <input type="text" wire:model="siteSearch" {{$siteOptionListActive ? 'autofocus':''}} placeholder="Start Typing..." />
                            </div>
                        </div>
                        {{$selectedSiteS}}
                    </div> --}}
                {{-- Snag MainCateg --}}
                <div class="form-groups ">
                    <label for="snag" class="col-form-label text-md-right">Main Categ <span
                            style="color:red;">*</span></label>

                    <select wire:model="selectedMaincateg" name="maincateg"
                        class="form-control block
                           " required>
                        <option value="">-- choose Main Categ --</option>
                        @foreach ($maincategs as $maincateg)
                            <option value="{{ $maincateg->id }}">{{ $maincateg->name }}</option>
                        @endforeach
                    </select>

                </div>

                {{-- Sub Categ --}}
                <div class="form-groups ">
                    <label for="state" class=" col-form-label text-md-right">Sub Categ <span
                            style="color:red;">*</span></label>
                    <div class="col-md-6">
                        <select wire:model="selectedSubcateg" name="subcateg" class="form-control " required>
                            @if ($subcategs->count() == 0)
                                <option value="">-- choose Main categ first --</option>
                            @endif
                            <option value="">-- choose Sub Categ --</option>
                            @foreach ($subcategs as $subcateg)
                                <option value="{{ $subcateg->id }}">{{ $subcateg->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- Snag list --}}
                {{-- <div class="form-groups row">
                    <label for="city" class=" col-form-label text-md-right">Snag <span
                            style="color:red;">*</span></label>
                    <div class="col-md-6">
                        <select wire:model="selectedSnag" name="snag" class="form-control" required>
                            @if ($snags->count() == 0)
                                <option value="">-- choose Sub categ first --</option>
                            @endif
                            <option value="">-- choose Snag --</option>
                            @foreach ($snags as $snag)
                                <option value="{{ $snag->id }}">{{ $snag->description }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
                {{-- Snag list with search --}}
                <div class="form-groups ">
                    <div class="select-box" id="snag">
                        <div class="options-container">
                            {{-- @foreach ($SnagsList as $ids => $snag) --}}
                            {{-- <div class="option">
                                        <input type="radio" class="radio"
                                            id="snag-{{ $snag->id }}" value="{{ $snag->id }}"
                                            name="snag_mangs" /> --}}
                            {{-- wire:model="selectedSnagsList" --}}
                            {{-- <label for="snag-{{ $snag->id }}">{{ $snag->description }}</label>
                                    </div>
                                @endforeach --}}
                        </div>
                        <div class="selected">
                            {{-- @if ($selectedSnagsList)
                                {{$selectedSnagsList}}
                                @else --}}
                            Select Snag
                            {{-- @endif --}}
                        </div>
                        <div class="search-box">
                            <input type="text" placeholder="Start Typing..." class="" />
                            {{-- wire:model="snagSearch" --}}
                        </div>
                    </div>
                </div>
                {{-- Extra Remarks for snag --}}
                <div class="form-groups ">
                    <label for="snag_name" class=" col-form-label text-md-right">Extra Remarks</label>
                    <div class="col-md-6">
                        <input wire:model="snag_name" type="text"
                            class="form-control block
                           " />
                    </div>
                </div>
                {{-- Submit Snag --}}
                {{-- @livewire('multi-select', ['optionList' => $SnagsList,"label"=>"Snag"]) --}}





            </div>
            <div class="formbuilder-date form-groups field-date-1647795088214">
                <label for="date-1647795088214" class="formbuilder-date-label">From</label>
                <input type="date" class="form-control block
                       " name="date-1647795088214"
                    access="false" id="date-1647795088214">
            </div>
            <div class="formbuilder-date form-groups field-date-1647795089799">
                <label for="date-1647795089799" class="formbuilder-date-label">To</label>
                <input type="date" class="form-control " name="date-1647795089799" access="false"
                    id="date-1647795089799">
            </div>

        </form>
    </div>

    @push('page_scripts')
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
                integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
        {{-- <script src="{{ asset('js/searchdrop.js') }}"></script> --}}
        <script src="{{ asset('css/fastclick.js') }}"></script>
        <script src="{{ asset('css/prism.js') }}></script>
        <script>
            document.addEventListener("DOMContentLoaded", function(e) {

                // default
                var els = document.querySelectorAll(".selectize");
                els.forEach(function(select) {
                    NiceSelect.bind(select);
                });

                // seachable
                var options = {
                    searchable: true
                };
                NiceSelect.bind(document.getElementById("seachable-select"), options);
            });
            // NiceSelect.bind(document.getElementById("seachable-select"), options);
            // $(document).ready(function() {
            //   var siteIdDrop= new SearchDrop('siteID');

            // $('.js-example-basic-single').select2({
            //     placeholder: 'Select an option',
            //     allowClear: true
            // });
            // });
            // function select(config){
            //    return {
            //        // data: data,
            //        data: config.data,
            //        emptyOptionsMessage: config.emptyOptionsMessage ?? 'No results match your search.',
            //        focusedOptionIndex: null,
            //        name: config.name,
            //        open: false,
            //        options: {},
            //        placeholder: config.placeholder ?? 'Select' + this.name,
            //        search: '',
            //        value: config.value,
            //        closeListbox: function() {
            //            this.open = false
            //            this.focusedOptionIndex = null
            //            this.search = ''
            //        },
            //        focusNextOption: function() {
            //            if (this.focusedOptionIndex === null) return this.focusedOptionIndex = Object.keys(this.options)
            //                .length - 1
            //            if (this.focusedOptionIndex + 1 >= Object.keys(this.options).length) return
            //            this.focusedOptionIndex++
            //            this.$refs.listbox.children[this.focusedOptionIndex].scrollIntoView({
            //                block: "center",
            //            })
            //        },
            //        focusPreviousOption: function() {
            //            if (this.focusedOptionIndex === null) return this.focusedOptionIndex = 0

            //            if (this.focusedOptionIndex <= 0) return
            //            this.focusedOptionIndex--
            //            this.$refs.listbox.children[this.focusedOptionIndex].scrollIntoView({
            //                block: "center",
            //            })
            //        },
            //        init: function() {
            //            this.options = this.data
            //            if (!(this.value in this.options)) this.value = null
            //            this.$watch('search', ((value) => {
            //                if (!this.open || !value) return this.options = this.data

            //                this.options = Object.keys(this.data)
            //                    .filter((key) => this.data[key].toLowerCase().includes(value.toLowerCase()))
            //                    .reduce((options, key) => {
            //                        options[key] = this.data[key]
            //                        return options
            //                    }, {})
            //            }))
            //        },
            //        selectOption: function() {
            //            if (!this.open) return this.toggleListboxVisibility()
            //            this.value = Object.keys(this.options)[this.focusedOptionIndex]
            //            this.closeListbox()
            //        },
            //        toggleListboxVisibility: function() {
            //            if (this.open) return this.closeListbox()
            //            this.focusedOptionIndex = Object.keys(this.options).indexOf(this.value)
            //            if (this.focusedOptionIndex < script 0) this.focusedOptionIndex = 0
            //            this.open = true
            //            this.$nextTick(() => {
            //                this.$refs.search.focus()

            //                this.$refs.listbox.children[this.focusedOptionIndex].scrollIntoView({
            //                    block: "center"
            //                })
            //            })
            //        },
            //    }
            // }
        </script>
    @endpush

</div>

{{-- {!! $SitesList !!} --}}

{{-- <table class="table">
        <thead>
            <tr>
                <th>Sang</th>
                <th>Subcateg</th>
            </tr>
        </thead>
        <tbody> --}}
{{-- @if (!empty($SnagsList))


                @foreach ($SnagsList as $snag)
                    <tr>
                        <td>{{ $snag->description }}</td>
                        <td>{{ $snag->sub_categ->main_categ->name }} → {{ $snag->sub_categ->name }}</td>
                    </tr>
                @endforeach
            @endif --}}
{{-- </tbody>
    </table> --}}
</div>
