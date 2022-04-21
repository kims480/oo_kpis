<div>

    @push('page_css')
        <link rel="stylesheet" href="{{ asset('css/multiselect.css') }}">
    @endpush
    <div class="container">
        <div class="transition-all duration-300 absolute top-2 right-1/2  bg-stone-200 text-sm text-blue-900 p-2 border-l-8 border-stone-600 rounded-md opacity-80" wire:loading >
            Processing data...
            <svg class="inline-block animate-spin -mr-1 ml-3 h-5 w-5 text-amber-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
               <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
               <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
           </svg>
       </div>
        <form wire:submit.prevent="storeSiteSnag" class="">
            <div class="card-body">
                <div class="md:grid  md:grid-cols-3 md:grid-rows-4 md:gap-2 grid grid-cols-1 grid-rows-12">

                    {{-- Site ID --}}
                    <div class="form-groups">
                        <label for="site">Site ID <span style="color:red;">*</span></label>

                        <div class="select-box " id="site" x-data="{ siteSelect: false }" @click.prevent="siteSelect=true"
                            @click.outside="siteSelect = false">
                            <div class="options-container active hidden " :class="{'hidden' : !siteSelect}" >
                                <div class="option">
                                    {{-- <input type="radio" class="radio" id="" /> --}}
                                    <label>Site ID</label>
                                </div>
                                @foreach ($SitesList as $id => $site)
                                    @if ($selectedSite_id==$id)
                                    <?php $site_name= $site ;?>
                                    @endif
                                    {{-- <div class="option" @updateSearch.window="showOption=checkIndexOf({textA:'{{$site}}',textB:$event.detail.typed})" :class="{'hidden':!showOption}"> --}}
                                    <div class="option" wire:click="$set('selectedSite_id',{{ $id }});$set('site_name',{{ $site }});">
                                        <input type="radio" class="radio" wire:click.stop="$set('selectedSite_id',{{ $id }})"
                                            id="site-{{ $id }}" value="{{ $id }}" name="selectedSite_id" required />
                                        <label for="site-{{ $id }}">{{ $site }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="selected">
                                {{ empty($site_name) ? 'Select Site ID' : $site_name }}
                            </div>

                            <div class="search-box opacity-0" :class="{'opacity-0' : !siteSelect}"
                                {{-- x-data="{fff:''}" x-init="$watch('fff', value => console.log(value))" --}}>
                                <input type="text" wire:model.debounce300ms="siteSearch" {{-- @keyup="$dispatch('updateSearch',{typed:$event.target.value}),fff=$event.target.value" --}}
                                    placeholder="Start Typing..." />
                            </div>
                        </div>
                    </div>

                    {{-- Sub Categ --}}
                    <div class="form-groups ">
                        <label  for="selectedMaincateg" class="col-form-label text-md-right">Main Categ</label>
                        <select wire:model="selectedMaincateg" name="selectedMaincateg"
                            class="form-control block
                           " >
                            <option value="">-- choose Main Categ --</option>
                            @foreach ($maincategs as $mainCateg_id => $mainCateg_name)
                                <option value="{{ $mainCateg_name->id }}">{{ $mainCateg_name->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Sub Sub Categ --}}
                    <div class="form-groups ">
                        <label for="subcateg" class=" col-form-label text-md-right">Sub Categ</label>
                        <div class="col-md-6">
                            <select  wire:model="selectedSubcateg" name="subcateg" class="form-control ">
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

                    {{-- Sub Snag --}}
                    <div class="form-groups ">
                        <label for="snag">Snag <span style="color:red;">*</span></label>

                        <div class="select-box" id="snag" x-data="{ siteSelect: false }" @click.prevent="siteSelect=true"
                            @click.outside="siteSelect = false">
                            <div class="options-container" active hidden"
                                :class="{'hidden' : !siteSelect,'active':siteSelect}">
                                <div class="option">
                                    <input type="radio" class="" id="" />
                                    <label>Snag</label>
                                </div>
                                @foreach ($SnagsList as $ids => $snag)

                                @if ($selectedSnag_id==$ids)
                                <?php $selectedSnagsList= $snag; ?>
                                @endif
                                    <div class="option" wire:click.stop="$set('selectedSnag_id',{{ $ids }})">
                                        <input type="radio" class="radio" id="snag-{{ $ids }}"
                                            value="{{ $ids }}" name="selectedSnag_id"
                                            wire:click.stop="$set('selectedSnag_id',{{ $ids }})" />
                                        <label for="snag-{{ $ids }}">{{ $snag }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="selected">
                                @if ($selectedSnagsList)
                                    {{ $selectedSnagsList }}
                                @else
                                    Select Snag
                                @endif
                            </div>
                            <div class="search-box opacity-0" :class="{'opacity-0' : !siteSelect}">
                                <input type="text" wire:model="snagSearch" placeholder="Start Typing..." class="" />
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

                    {{-- Reported Date --}}
                    <div class="formbuilder-date form-groups field-date-1647795088214">
                        <label for="date-1647795088214" class="formbuilder-date-label">Reported Date</label>
                        <input type="date" class="form-control block
                       " name=" id="
                            date-1647795088214">
                    </div>

                    {{-- Domain --}}
                    <div class="form-groups ">
                        <label for="state" class=" col-form-label text-md-right">Domain</label>
                        <div class="col-md-6">
                            <select wire:model="selectedSnag_domain" name="selectedSnag_domain" class="form-control "
                                >
                                @if ($snag_domain->count() == 0)
                                    <option value="">-- choose Domain --</option>
                                @endif
                                <option value="">-- choose Domain --</option>
                                @foreach ($snag_domain as $domain_id => $domain_name)
                                    <option value="{{ $domain_id }}">{{ $domain_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Reported In --}}
                    <div class="form-groups ">
                        <label for="state" class=" col-form-label text-md-right">Reported In </label>
                        <div class="col-md-6">
                            <select wire:model="selectedSnag_reporter" name="selectedSnag_reporter"
                                class="form-control " >
                                @if ($snag_reporter->count() == 0)
                                    <option value="">-- Snag Source --</option>
                                @endif
                                <option value="">-- Snag Source --</option>
                                @foreach ($snag_reporter as $reporter_id => $reporter_name)
                                    <option value="{{ $reporter_id }}">{{ $reporter_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Remarks --}}
                    <div class="form-groups ">
                        <label for="state" class=" col-form-label text-md-right">Remarks </label>
                        <div class="col-md-6">
                            <select wire:model="selectedSnag_remarks"  class="form-control "
                            >
                            @if ($snag_remarks->count() == 0)
                            <option value="">-- Snag Remarks --</option>
                            @endif
                            <option value="">-- Snag Remarks --</option>

                            @foreach ($snag_remarks as $remark_id => $remark)
                                    <option value="{{ $remark_id }}">{{ $remark }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="form-groups ">
                        <label for="state" class=" col-form-label text-md-right">Status </label>
                        <div class="col-md-6">
                            <select wire:model="selectedSnag_status"  class="form-control ">
                                @if ($snags_status->count() == 0)
                                    <option value="">-- Snag Status --</option>
                                @endif
                                <option value="" disabled> --Snag Status-- </option>
                                @foreach ($snags_status as $status_id => $status_name)
                                    <option value="{{ $status_id }}">{{ $status_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Closure Date --}}
                    <div class="formbuilder-date form-groups field-date-1647795089799">
                        <label for="closure_date" class="formbuilder-date-label">Closure Date</label>
                        <input type="date" class="form-control " name="closure_date" access="false"
                            id="closure_date">
                    </div>
                    <pre>
                        {{-- {{ $site_name}}
                        {!!$selectedSite_id?? null !!}
                        {!!$selectedSnag_id?? null !!}
                        {!!$selectedMaincateg !!}
                        {!!$selectedSubcateg !!}
                        {!!$selectedSnag_status?? null !!}
                        {!!$selectedSnag_domain?? null !!}
                        {!!$selectedSnag_reporter?? null !!}
                        {{ $selectedSnag_remarks?? null }} --}}
                    </pre>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" wire:click="storeSiteSnag()" class="btn btn-default">
                    Add Snag to Site
                </button>
                {{-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!} --}}
                <a href="{{ route('siteSnags.index') }}" class="btn btn-default">
                    @lang('crud.cancel')
                </a>
            </div>
        </form>
    </div>
    @push('page_scripts')
        {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script> --}}

        <script src="{{ asset('js/searchdrop.js') }}"></script>
        <script>
            new SearchDrop('#site');
            new SearchDrop('#snag');
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function(e) {});
        </script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
    //         integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
    //         crossorigin="anonymous" referrerpolicy="no-referrer">
    {{-- // <script src="{{ asset('js/searchdrop.js') }}"></script>
    // {{-- <script src="{{ asset('js/nice-select2.js') }}"></script>
    // <script src="{{ asset('js/fastclick.js') }}"></script>
    // <script src="{{ asset('js/prism.js') }}"> </script> --}}
        {{-- // default
    // var els = document.querySelectorAll(".selectize");
    // els.forEach(function(select) {
    //     NiceSelect.bind(select);
    // });

    // // seachable
    // var options = {
    //     searchable: true
    // };
    // NiceSelect.bind(document.getElementById("seachable-select"), options);
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
            // } --}}
        {{-- </script> --}}
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
{{-- <select id="site" wire:model="site_s">
                        <option data-display="Select" disabled>Site ID</option>
                        @foreach ($SitesList as $id => $site)
                            <option value="{{ $id }}"> {{ $site }}</option>
                        @endforeach
                     </select> --}}
{{-- {{ $site_s }} --}}
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
{{-- Snag MainCateg --}}
{{-- @livewire('multi-select', ['optionList' => $SnagsList,"label"=>"Snag"]) --}}
</div>
