<div class="card w-full p-1" x-data={filtersOn:false}>
    <div class="card-body relative ">
        @include('flash::message')

        <div class="options flex justify-between pb-2 items-center border-b-2 border-slate-800">
            <div class="form ">
                <form wire:submit.prevent="import">
                    <input type="file" wire:model="your_file">

                    @error('your_file')
                        <span class="error">{{ $message }}</span>
                    @enderror

                    <button class="btn btn-default" type="submit" wire:loading.attr="disabled">Upload Sites</button>
                </form>

            </div>

            <div class="form-check flex w-52 form-switch ml-auto mr-2">
                <div class="form-groups flex flex-col items-center mr-2">
                    <label for="snag" class="col-form-label text-md-right mr-1">#Results: </label>
                    <select wire:model="perPage" class="form-control block w-full">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>

                </div>
                <div class="form-groups  items-center flex">
                    <input
                        class="form-check-input appearance-none w-9 ml-10 rounded-full float-left h-5 align-top bg-white bg-no-repeat bg-contain bg-gray-300 focus:outline-none cursor-pointer shadow-sm"
                        type="checkbox" role="switch" id="flexSwitchCheckChecked" @click="filtersOn=!filtersOn">
                    <label class="form-check-label inline-block text-gray-800"
                        for="flexSwitchCheckChecked">Filter</label>
                </div>
            </div>

            <button wire:click.prevent="export" x-data={isOpen:false}
                class="transition ease-in-out btn btn-default relative has-tooltips text-sm " data-mdb-ripple="true"
                @mouseover="isOpen=true" @mouseover.away="isOpen=false">
                <x-tooltip message='Export excel' />
                <i class="far fa-file-excel "></i> Export
            </button>
        </div>

        <table class="table mt-2">
            <thead>
                <tr x-show="filtersOn">
                    <th>
                        {{-- {!! Form::text('id', null, ['class' => 'text-sm border-0 rounded-none border-b-2 p-1 ', 'placeholder' => __('models/sites.fields.id'), 'wire:model' => '']) !!} --}}

                    </th>
                    <th>
                        {!! Form::text('site_id', null, ['class' => 'text-sm border-0 rounded-none border-b-2 p-1 ', 'placeholder' => __('models/sites.fields.site_id'), 'wire:model' => 'site_id']) !!}
                    </th>
                    <th>
                        {{-- {!! Form::text('lat', null, ['class' => 'text-sm border-0 rounded-none border-b-2 p-1 ', 'placeholder' => __('models/sites.fields.lat'), 'wire:model' => '']) !!} --}}
                    </th>
                    <th>
                        {{-- {!! Form::text('long', null, ['class' => 'text-sm border-0 rounded-none border-b-2 p-1 ', 'placeholder' => __('models/sites.fields.long'), 'wire:model' => '']) !!} --}}
                    </th>
                    <th> {!! Form::text('nis', null, ['class' => 'text-sm border-0 rounded-none border-b-2 p-1 ', 'placeholder' => __('models/sites.fields.nis'), 'wire:model' => 'site_id']) !!}
                    </th>
                    <th> {!! Form::text('prio', null, ['class' => 'text-sm border-0 rounded-none border-b-2 p-1 ', 'placeholder' => __('models/sites.fields.prio'), 'wire:model' => 'prio']) !!}
                    </th>
                    <th> {!! Form::text('categ', null, ['class' => 'text-sm border-0 rounded-none border-b-2 p-1 ', 'placeholder' => __('models/sites.fields.categ'), 'wire:model' => 'categ']) !!}
                    </th>
                    <th> {!! Form::text('govern', null, ['class' => 'text-sm border-0 rounded-none border-b-2 p-1 ', 'placeholder' => __('models/sites.fields.govern'), 'wire:model' => 'govern']) !!}
                    </th>
                    <th> {!! Form::text('wilayat', null, ['class' => 'text-sm border-0 rounded-none border-b-2 p-1 ', 'placeholder' => __('models/sites.fields.wilayat'), 'wire:model' => 'wilayat']) !!}
                    </th>
                    <th> {!! Form::text('office', null, ['class' => 'text-sm border-0 rounded-none border-b-2 p-1 ', 'placeholder' => __('models/sites.fields.office'), 'wire:model' => 'office']) !!}
                    </th>
                    <th>
                        {{-- {!! Form::text('address', null, ['class' => 'text-sm border-0 rounded-none border-b-2 p-1 ', 'placeholder' => __('models/sites.fields.address'), 'wire:model' => '']) !!} --}}
                    </th>
                    <th></th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>{!! __('models/sites.fields.site_id') !!}</th>
                    <th>{!! __('models/sites.fields.lat') !!}</th>
                    <th>{!! __('models/sites.fields.long') !!}</th>
                    <th>{!! __('models/sites.fields.nis') !!}</th>
                    <th>{!! __('models/sites.fields.prio') !!}</th>
                    <th>{!! __('models/sites.fields.categ') !!}</th>
                    <th>{!! __('models/sites.fields.govern') !!}</th>
                    <th>{!! __('models/sites.fields.wilayat') !!}</th>
                    <th>{!! __('models/sites.fields.office') !!}</th>
                    <th>{!! __('models/sites.fields.address') !!}</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($sites))


                    @foreach ($sites as $site)
                        <tr>
                            <td>{{ $site->id ?? null }}</td>
                            <td>
                                {{ $site->site_id ?? null }}

                            <td>{{ $site->lat ?? null }}</td>
                            <td>{{ $site->long ?? null }}</td>
                            <td>{{ $site->nis ?? null }}</td>
                            <td>{{ $site->priority->name ?? null }}</td>
                            <td>{{ $site->category->name ?? null }}</td>
                            <td>{{ $site->govern->name ?? null }}</td>
                            <td>{{ $site->wilayat->name ?? null }}</td>
                            <td>{{ $site->office->name ?? null }}</td>
                            <td>{{ $site->address ?? null }}</td>
                            <td class="actions">

                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
            <div
                class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white shadow-lg px-12">
                <div class="flex justify-between">
                    <div class="inline-flex border rounded w-7/12 px-2 lg:px-6 h-12 bg-transparent">
                        <div class="flex flex-wrap items-stretch w-full h-full mb-6 relative">
                            <div class="flex">
                                <span
                                    class="flex items-center leading-normal bg-transparent rounded rounded-r-none border border-r-0 border-none lg:px-3 py-2 whitespace-no-wrap text-grey-dark text-sm">
                                    <svg width="18" height="18" class="w-4 lg:w-auto" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z"
                                            stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <input type="text"
                                class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px flex-1 border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs lg:text-xs lg:text-base text-gray-500 font-thin"
                                placeholder="Search">
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                                ID</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                                Fullname</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                                Email</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                                Phone</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                                Status</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                                Created At</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr>
                            <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-500">
                                <div class="flex items-center">
                                    <div>
                                        <div class="text-sm leading-5 text-gray-800">#1</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-500">
                                <div class="text-sm leading-5 text-blue-900">Damilare Anjorin</div>
                            </td>
                            <td
                                class="px-6 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                damilareanjorin1@gmail.com</td>
                            <td
                                class="px-6 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                +2348106420637</td>
                            <td
                                class="px-6 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                <span
                                    class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                    <span aria-hidden
                                        class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                    <span class="relative text-xs">active</span>
                                </span>
                            </td>
                            <td
                                class="px-6 py-2 whitespace-no-wrap border-b border-gray-500 text-blue-900 text-sm leading-5">
                                September 12</td>
                            <td
                                class="px-6 py-2 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                                <button
                                    class="px-5 py-1 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">View
                                    Details</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
                    <div>
                        <p class="text-sm leading-5 text-blue-700">
                            Showing
                            <span class="font-medium">1</span>
                            to
                            <span class="font-medium">200</span>
                            of
                            <span class="font-medium">2000</span>
                            results
                        </p>
                    </div>
                    <div>
                        <nav class="relative z-0 inline-flex shadow-sm">
                            <div>
                                <a href="#"
                                    class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
                                    aria-label="Previous" v-on:click.prevent="changePage(pagination.current_page - 1)">
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                            <div>
                                <a href="#"
                                    class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-blue-700 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-tertiary active:text-gray-700 transition ease-in-out duration-150 hover:bg-tertiary">
                                    1
                                </a>
                                <a href="#"
                                    class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-blue-600 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-tertiary active:text-gray-700 transition ease-in-out duration-150 hover:bg-tertiary">
                                    2
                                </a>
                                <a href="#"
                                    class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-blue-600 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-tertiary active:text-gray-700 transition ease-in-out duration-150 hover:bg-tertiary">
                                    3
                                </a>
                            </div>
                            <div v-if="pagination.current_page < pagination.last_page">
                                <a href="#"
                                    class="-ml-px relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
                                    aria-label="Next">
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="border-t-2 border-slate-50 mt-3 flex justify-center p-2 w-full max-w-full">
        <div class=""> {{ $sites->links() }}
        </div>
    </div>
</div>
