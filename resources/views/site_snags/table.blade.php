{{-- <div class="table-responsive table-striped table-sm table-bordered"> --}}
<!-- component -->
<div class="scrollbar-thin scrollbar-thumb-slate-700 scrollbar-track-slate-300">
<table class=" w-full table-auto mb-2  {{-- h-32  --}}">
    <thead>
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-left">#</th>
            <th class="py-3 px-6 text-left w-12 overflow-hidden">@lang('models/siteSnags.fields.site_id')</th>
            <th class="py-3 px-6 text-center">Main Categ</th>
            <th class="py-3 px-6 text-center">Sub Categ</th>
            <th class="py-3 px-6 text-center">@lang('models/siteSnags.fields.snagmangs')</th>
            <th class="py-3 px-6 text-center">Status</th>
            <th class="py-3 px-6 text-center">Reported By</th>
            <th class="py-3 px-6 text-center">Domain</th>
            <th class="py-3 px-6 text-center">Reported In</th>
            <th class="py-3 px-6 text-center">Remarks</th>

            <th class="py-3 px-6 text-center">@lang('crud.action')</th>
        </tr>
    </thead>
    <tbody class="text-gray-600 text-sm font-light">
        @foreach ($siteSnags as $siteSnag)
            <tr x-data="{opacity: {{$loop->last==$loop->iteration}}}" class="border-b border-gray-200 odd:bg-gray-50 hover:bg-gray-100 [visibility:none]   animate-dropdown [animation-delay:{{$loop->iteration*0.1}}s]" :class="opacity ? 'opacity-100':'opacity-0'">
                <td class=" px-1 text-left whitespace-nowrap">
                    <div class="flex items-center">
                        {{-- <div class="mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                width="24" height="24"
                                                viewBox="0 0 48 48"
                                                style=" fill:#000000;">
                                                <path fill="#80deea" d="M24,34C11.1,34,1,29.6,1,24c0-5.6,10.1-10,23-10c12.9,0,23,4.4,23,10C47,29.6,36.9,34,24,34z M24,16	c-12.6,0-21,4.1-21,8c0,3.9,8.4,8,21,8s21-4.1,21-8C45,20.1,36.6,16,24,16z"></path><path fill="#80deea" d="M15.1,44.6c-1,0-1.8-0.2-2.6-0.7C7.6,41.1,8.9,30.2,15.3,19l0,0c3-5.2,6.7-9.6,10.3-12.4c3.9-3,7.4-3.9,9.8-2.5	c2.5,1.4,3.4,4.9,2.8,9.8c-0.6,4.6-2.6,10-5.6,15.2c-3,5.2-6.7,9.6-10.3,12.4C19.7,43.5,17.2,44.6,15.1,44.6z M32.9,5.4	c-1.6,0-3.7,0.9-6,2.7c-3.4,2.7-6.9,6.9-9.8,11.9l0,0c-6.3,10.9-6.9,20.3-3.6,22.2c1.7,1,4.5,0.1,7.6-2.3c3.4-2.7,6.9-6.9,9.8-11.9	c2.9-5,4.8-10.1,5.4-14.4c0.5-4-0.1-6.8-1.8-7.8C34,5.6,33.5,5.4,32.9,5.4z"></path><path fill="#80deea" d="M33,44.6c-5,0-12.2-6.1-17.6-15.6C8.9,17.8,7.6,6.9,12.5,4.1l0,0C17.4,1.3,26.2,7.8,32.7,19	c3,5.2,5,10.6,5.6,15.2c0.7,4.9-0.3,8.3-2.8,9.8C34.7,44.4,33.9,44.6,33,44.6z M13.5,5.8c-3.3,1.9-2.7,11.3,3.6,22.2	c6.3,10.9,14.1,16.1,17.4,14.2c1.7-1,2.3-3.8,1.8-7.8c-0.6-4.3-2.5-9.4-5.4-14.4C24.6,9.1,16.8,3.9,13.5,5.8L13.5,5.8z"></path><circle cx="24" cy="24" r="4" fill="#80deea"></circle>
                                            </svg>
                                        </div> --}}
                        <span class="font-medium">{{ $siteSnag->id }}</span>
                    </div>
                </td>
                <td class=" px-1 text-left">
                    <div class="flex items-center w-16 overflow-hidden">
                        <div class="mr-2">
                            {{-- <i class="fa"></i> --}}
                        </div>
                        <span>{{ $siteSnag->site->site_id }}</span>
                    </div>
                </td>
                <td class=" px-1 text-center">
                    <div class="flex items-center justify-center">
                    </div>
                    <span>{{ $siteSnag->snag->sub_categ->main_categ->name }}</span>
                </td>
                <td class=" px-1 text-center">
                    <span
                        class=" text-purple-600 py-1 px-3 rounded-full text-xs">{{ $siteSnag->snag->sub_categ->name }}</span>
                </td>
                <td class=" px-1 text-center">
                    <span
                        class=" text-purple-600 py-1 px-3 rounded-full text-xs">{{ $siteSnag->snag->description }}</span>
                </td>

                <td class=" px-1 text-center ">
                    @if( !empty($siteSnag->snagstatus->name))
                        @if ($siteSnag->snagstatus->name=='Closed')

                        <x-pill.pill-success >{{ $siteSnag->snagstatus->name ?? '' }}</x-pill.pill-success>
                        @elseif ($siteSnag->snagstatus->name=='Pending')

                        <x-pill.pill-warning >{{ $siteSnag->snagstatus->name ?? '' }}</x-pill.pill-warning>
                        @elseif ($siteSnag->snagstatus->name=='Open')
                        <x-pill.pill-info >{{ $siteSnag->snagstatus->name ?? '' }}</x-pill.pill-info>
                        @endif
                    {{-- <span
                        class=" {{  ($siteSnag->snagstatus->name=='Closed') ? 'bg-green-200 text-green-600' : ''}} {{ () ?'bg-amber-200 text-amber-600':'' }}{{  ?'bg-slate-200 text-slate-600 ':'' }} py-1 px-3 rounded-full text-xs">
                    </span> --}}
                    @endif
                </td>
                <td class=" px-1 text-center">
                    <span
                        class="  py-1 px-3 rounded-full text-xs">{{ $siteSnag->reportedBy->name ?? '' }}</span>
                </td>
                <td class=" px-2 text-center">
                    <span
                        class="  py-1 px-3 rounded-full text-xs">{{ $siteSnag->snagdomain->name ?? '' }}</span>
                </td>
                <td class=" px-2 text-center">
                    <span       class="  py-1 px-3 rounded-full text-xs">{{ $siteSnag->snagreporter->name ?? '' }}</span>
                </td>
                <td class=" px-2 text-center">
                    <span
                        class=" py-1 px-3 rounded-full text-xs">{{ $siteSnag->snagremark->remark ?? '' }}</span>
                </td>
                <td class=" px-2 text-center">
                    <div class="flex item-center justify-center">
                        <div class='btn-group px-8 flex justify-between justify-items-center'>
                            <a href="{{ route(__('models/siteSnags.url').'.show', [$siteSnag->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            @can('site-snags.edit')

                            <a href="{{ route(__('models/siteSnags.url').'.edit', [$siteSnag->id]) }}" class='btn btn-success btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            @endcan
                            @can('site-snags.destroy')
                            {!! Form::open(['route' => [__('models/siteSnags.url').'.destroy', $siteSnag->id], 'method' => 'delete']) !!}
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            {!! Form::close() !!}
                            @endcan
                        </div>
                        {{-- <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div> --}}
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
{{-- <div class="overflow-x-auto">
    <div
        class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
        <div class="w-full lg:w-5/6">
            <div class="bg-white shadow-md rounded my-6">
            </div>
        </div>
    </div>
</div> --}}

{{-- </div> --}}
