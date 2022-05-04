<div class="">
    @push('page_css')
        <link rel="stylesheet" href="{{ asset('css/multiselect.css') }}">
    @endpush
    <x-multi-select label="Site ID" itemId="site" :optionSelectedId="$selectedSite_id" optionValue="selectedSite_id" optionName="site_name"
        :optionSelectedName="$site_name" :optionList="$SitesList" itemSearch="siteSearch" />
        {{$site_name}}
    <div class="form-groups ">
        <label for="selectedMaincateg" class="col-form-label text-md-right">Main Categ</label>
        <select wire:model="selectedMaincateg" {{-- name="selectedMaincateg" --}} id="selectedMaincateg"
            class="form-control block
           ">
            <option value="">-- choose Main Categ --</option>
            @foreach ($maincategs as $mainCateg_id => $mainCateg_name)
                <option value="{{ $mainCateg_name->id }}">{{ $mainCateg_name->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Sub Categ --}}
    <div class="form-groups ">
        <label for="selectedSubcateg" class=" col-form-label text-md-right">Sub Categ</label>
        <div class="col-md-6">
            <select wire:model="selectedSubcateg" {{-- name="selectedSubcateg" --}} id="selectedSubcateg" class="form-control ">
                <option value="">-- choose Sub Categ --</option>
                @foreach ($subcategs as $subcateg)
                    <option value="{{ $subcateg->id }}">{{ $subcateg->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Snag --}}
    <x-multi-select label="Snag" itemId="snag" optionValue="selectedSnag_id" :optionSelectedId="$selectedSnag_id" optionName="snag_name"
        :optionSelectedName="$snag_name" :optionList="$SnagsList" itemSearch="snagSearch" />
</div>
