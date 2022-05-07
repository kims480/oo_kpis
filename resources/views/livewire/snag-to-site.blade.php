<div class="">
    @push('page_css')
        <link rel="stylesheet" href="{{ asset('css/multiselect.css') }}">
    @endpush
    <x-multi-select label="Site ID" itemId="site" :optionSelectedId="$selectedSite_id" optionValue="selectedSite_id" optionName="site_name"
        :optionSelectedName="$site_name" :optionList="$SitesList" itemSearch="siteSearch" />
    {{ $site_name }}
    {{-- Main Categ --}}
    <x-select label="Main Categ" id="selectedMaincateg" :itemsList="$maincategs" selectedItem="selectedMaincateg" />

    {{-- Sub Sub Categ --}}
    <x-select label="Sub Categ" id="subcateg" :itemsList="$subcategs" selectedItem="selectedSubcateg" />



    {{-- Snag --}}
    <x-multi-select label="Snag" itemId="snag" optionValue="selectedSnag_id" :optionSelectedId="$selectedSnag_id" optionName="snag_name"
        :optionSelectedName="$snag_name" :optionList="$SnagsList" itemSearch="snagSearch" />
</div>
