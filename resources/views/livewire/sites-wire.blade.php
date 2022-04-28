<div class="card w-full p-1" x-data={filtersOn:false}>
    <div class="card-body relative ">
        @include('flash::message')
        <div class="transition-all duration-300 absolute top-2 right-1/2  bg-stone-200 text-sm text-blue-900 p-2 border-l-8 border-stone-600 rounded-md opacity-80"
            wire:loading>
            Processing Data...
            <svg class="inline-block animate-spin -mr-1 ml-3 h-5 w-5 text-amber-400" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
        </div>
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

        <table class="table mt-2 overflow-x-auto">
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

    </div>
    <div class="border-t-2 border-slate-50 mt-3 flex justify-center p-2 w-full max-w-full">
        <div class=""> {{ $sites->links() }}
        </div>
    </div>
</div>
