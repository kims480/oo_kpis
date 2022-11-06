 {{-- Site ID --}}
 <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:max-w-lg">
 <x-multi-select label="Site ID" itemId="site" :optionSelectedId="$selectedSite_id" optionValue="selectedSite_id" optionName="site_name"
     :optionSelectedName="$site_name" :optionList="$SitesList" itemSearch="siteSearch" />


         {{-- <x-select label="Search Site_ID" wire:model.defer="siteSearch"
         placeholder="Select some user" :async-data="route('api.sites.all')"
         option-label="name" option-value="id" option-description="email" /> --}}
 </div>
