<div>

    @push('page_css')
        <link rel="stylesheet" href="{{ asset('css/multiselect.css') }}">
    @endpush
    <div class="container">
        <div class="transition-all duration-300 absolute top-2 right-1/2  bg-stone-200 text-sm text-blue-900 p-2 border-l-8 border-stone-600 rounded-md opacity-80"
            wire:loading>
            Processing data...
            <svg class="inline-block animate-spin -mr-1 ml-3 h-5 w-5 text-amber-400" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                    stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
        </div>
        <form wire:submit.prevent="storeSiteSnag" class="">
            <div class="card-body overflow-hidden">
                <div class="md:grid  md:grid-cols-3 md:grid-rows-4 md:gap-2 grid grid-cols-1 grid-rows-12">

                    {{-- Site ID --}}
                    <x-multi-select label="Site ID" itemId="site" :optionSelectedId="$selectedSite_id" optionValue="selectedSite_id"
                        optionName="site_name" :optionSelectedName="$site_name" :optionList="$SitesList" itemSearch="siteSearch" />

                    {{-- Main Categ --}}
                    <x-select label="Main Categ" id="selectedMaincateg" :itemsList="$maincategs"
                        selectedItem="selectedMaincateg" />

                    {{-- Sub Sub Categ --}}
                    <x-select label="Sub Categ" id="subcateg" :itemsList="$subcategs" selectedItem="selectedSubcateg" />


                    {!! Form::select('snag_list',$SnagsList ,null, ['multiple','class' => 'snags-list']) !!}


                    {{-- Sub Snag --}}
                    <x-multi-select label="Snag" itemId="snag" optionValue="selectedSnag_id" :optionSelectedId="$selectedSnag_id"
                        optionName="snag_name" :optionSelectedName="$snag_name" :optionList="$SnagsList" itemSearch="snagSearch" />

                    {{-- Reported Date --}}
                    <x-forms.input id="report_date" type="date" label="Reported Date" wireModel="" />

                    {{-- Domain --}}
                    <x-select-filtered label="Domain" id="selectedSnag_domain" :itemsList="$snag_domain"
                        selectedItem="selectedSnag_domain" />

                    {{-- Reported In --}}
                    <x-select-filtered label="Reported In" id="selectedSnag_reporter" :itemsList="$snag_reporter"
                        selectedItem="selectedSnag_reporter" />

                    {{-- Remarks --}}
                    <x-select-filtered label="Remarks" id="snag-remarks" :itemsList="$snag_remarks"
                        selectedItem="selectedSnag_remarks" />

                    {{-- Status --}}
                    <x-select-filtered label="Snag Status" id="snag-status" :itemsList="$snags_status"
                        selectedItem="selectedSnag_status" />


                    {{-- Severity --}}
                    <x-select-filtered label="Snag Severity" id="snag-severity" :itemsList="$snags_severity"
                        selectedItem="severity" />


                    {{-- Closure Date --}}
                    <x-forms.input id="closure_date" type="date" label="Closure Date" wireModel="" />

                    {{-- Spares Required --}}
                    <table>
                        <thead>
                            <th>Item</th>
                            <th>Quintity</th>
                        </thead>
                        <tbody>

                            @foreach ($requiredMeterials as $index=>$requiredMaterial)
                            <tr>
                                <td>

                                    <select name="requiredMaterials[{{$index}}][spare_part_id]" wire:model="requiredMeterials.{{$index}}.spare_part_id" >
                                        <option value="">-- Choose Spare --</option>
                                        @foreach ($meterialList as $index=>$item)
                                        {{-- @dump($item['detail']) --}}
                                        <option value="{{$item['id']}}">{{$item['detail']}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input id="" type="number" name="requiredMaterials[{{$index}}][qty]"  wire:model="requiredMeterials.{{$index}}.qty" />
                                </td>
                                <td>-</td>
                            </tr>

                            @endforeach
                            <tr>
                                <td class="col-span-2">
                                    <button wire:click.prevent="addSpare">
                                        Add Material
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @dump($requiredMeterials)
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" wire:click="storeSiteSnag()" class="btn btn-default">
                    Add Snag to Site
                </button>
                {{-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!} --}}
                <a href="{{ route('site-snags.index') }}" class="btn btn-default">
                    @lang('crud.back')
                </a>
            </div>
        </form>
    </div>

    @push('page_scripts')
        {{-- <script src="{{asset('js/searchdrop.js')}}"></script> --}}
        <script>

            const choices = new Choices(document.querySelector('.snags-list'));
        </script>


    @endpush

</div>
