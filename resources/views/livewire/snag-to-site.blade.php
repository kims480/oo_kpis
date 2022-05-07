<div class="card">
    <div class="p-2">
        @push('page_css')
            {{-- <link rel="stylesheet" href="{{ asset('css/multiselect.css') }}"> --}}
        @endpush
        <div class=" p-1 border">
            <x-multi-select label="Site ID" itemId="site" :optionSelectedId="$selectedSite_id" optionValue="selectedSite_id"
                optionName="site_name" :optionSelectedName="$site_name" :optionList="$SitesList" itemSearch="siteSearch" />
        </div>
        <div class="border p-1 mt-1">
            {{-- Main Categ --}}
            <x-select label="Main Categ" id="selectedMaincateg" :itemsList="$maincategs" selectedItem="selectedMaincateg" />

            {{-- Sub Sub Categ --}}
            <x-select label="Sub Categ" id="subcateg" :itemsList="$subcategs" selectedItem="selectedSubcateg" />

            {{-- Snag --}}
            <x-multi-select label="Snag" itemId="snag" optionValue="selectedSnag_id" :optionSelectedId="$selectedSnag_id"
                optionName="snag_name" :optionSelectedName="$snag_name" :optionList="$SnagsList" itemSearch="snagSearch" />
        </div>
        <div class="p-1">

            <div class="overflow-auto lg:overflow-visible">
                <div class="flex lg:justify-between border-b-2 border-fuchsia-900 pb-1">
                    <h2 class="text-2xl text-gray-500 font-bold">All Snags</h2>
                    <div class="text-center flex-auto">
                        <input type="text" name="name" placeholder="Search..."
                            class="
                            w-1/3
                            py-2
                            border-b-2 border-blue-600
                            outline-none
                            focus:border-yellow-400
                          " />
                    </div>

                    <div>
                        <a href="#">
                            <button
                                class="
                              bg-blue-500
                              hover:bg-blue-700
                              text-white
                              py-1
                              px-3
                              sm
                              rounded-full
                            ">
                                All
                            </button>
                        </a>
                        <a href="#">
                            <button class="bg-blue-500  hover:bg-blue-700  text-white py-1 px-3 sm rounded-full">
                                Admin
                            </button>
                        </a>
                        <a href="#">
                            <button
                                class="
                              bg-blue-500
                              hover:bg-blue-700
                              text-white
                              py-1
                              px-3
                              sm
                              rounded-full
                            ">
                                User
                            </button></a>
                    </div>
                </div>
                <table class="tables w-full text-gray-400 border-separate [-webkit-border-horizontal-spacing:0] [-webkit-border-vertical-spacing:15px]  space-y-6 text-sm ">
                    <thead class="bg-blue-500 text-white">
                        <tr>
                            <th class="p-3 rounded-l-md">Site ID</th>
                            <th class="p-3 text-left">Sub Categ</th>
                            <th class="p-3 text-left">Snag</th>
                            <th class="p-3 text-left">Snag Domain</th>

                            <th class="p-3 text-left">Status</th>
                            <th class="p-3 text-left rounded-r-md">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($SiteSnagsList as $siteSnag)

                        <tr class="bg-blue-200 lg:text-black space-y-2">
                            <td class="p-3 font-medium capitalize rounded-l-md">{{$siteSnag->site->site_id}}</td>
                            <td class="p-3">{{$siteSnag->snag->sub_categ->name}}</td>
                            <td class="p-3">{{$siteSnag->snag->description}}</td>
                            <td class="p-3 uppercase">{{$siteSnag->snagdomain->name??''}}</td>

                            <td class="p-3">
                                <span class="bg-green-400 text-gray-50 rounded-md px-2">{{$siteSnag->snagstatus->name??''}}</span>
                            </td>
                            <td class="p-3 rounded-r-md">
                                <a href="#" class="text-gray-500 hover:text-gray-100 mr-2">
                                    <i class="material-icons-outlined text-base">v</i>
                                </a>
                                <a href="#" class="text-yellow-400 hover:text-gray-100 mx-2">
                                    <i class="material-icons-outlined text-base">e</i>
                                </a>
                                <a href="#" class="text-red-400 hover:text-gray-100 ml-2">
                                    <i class="material-icons-round text-base">d</i>
                                </a>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
