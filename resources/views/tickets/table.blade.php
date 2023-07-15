<div class="w-full ">
    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-max w-full table-auto text-sm">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-xs leading-normal">

                    <th class="py-1 px-2 text-center">@lang('models/tickets.fields.tt_number')</th>
                    <th class="py-1 px-2 text-left">@lang('models/tickets.fields.site_id')</th>
                    <th class="py-1 px-2 text-center">@lang('models/tickets.fields.alarm_name')</th>
                    <th class="py-1 px-2 text-center">@lang('models/tickets.fields.description')</th>
                    <th class="py-1 px-2 text-center">@lang('models/tickets.fields.categ')</th>
                    <th class="py-1 px-2 text-center">@lang('models/tickets.fields.contractor')</th>
                    <th class="py-1 px-2 text-center">@lang('models/tickets.fields.status')</th>

                    <th class="py-1 px-2 text-center">@lang('models/tickets.fields.created_at')</th>
                    <th class="py-1 px-2 text-center">@lang('models/tickets.fields.sla')</th>
                    <th class="py-1 px-2 text-center" colspan="2">@lang('crud.action')</th>
                </tr>
            </thead>

            <tbody class="text-gray-600 text-xs font-light">
                @isset($tickets)
                    @foreach ($tickets as $ticket)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-1 px-2 text-center"><span class="font-medium">{{ $ticket->tt_number }}</span></td>
                            <td ؤlass="py-1 px-2 text-left">{{ $ticket->site->site_id }}</td>
                            <td class="py-1 px-2 text-center">{{ $ticket->alarm->name }}</td>
                            <td class="py-1 px-2 text-center">{{ $ticket->description }}</td>
                            <td class="py-1 px-2 text-center">{{ $ticket->tt_categ->name }}</td>
                            <td class="py-1 px-2 text-center">{{ $ticket->tt_contractor->name }}</td>
                            <td class="py-1 px-2 text-center">
                                {{-- @dd($ticket->status) --}}
                                <span class="{{$ticket->tt_status->name}}">{{$ticket->tt_status->name}} </span>
                            </td>
                            <td class="py-1 px-2 text-center">{{ $ticket->created_at }}</td>
                            <td class="py-1 px-2 text-center">{{ $ticket->alarm->sla }}</td>
                            <td class="py-1 px-2 text-center" colspan="2">
                                {!! Form::open(['route' => ['tickets.destroy', $ticket->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{{ route('tickets.show', [$ticket->id]) }}" class='btn btn-default btn-xs'>
                                        <i class="far fa-eye"></i>
                                    </a>
                                    @can('tickets.edit')
                                        <a href="{{ route('tickets.edit', [$ticket->id]) }}" class='btn btn-default btn-xs'>
                                            <i class="far fa-edit"></i>
                                        </a>
                                    @endcan
                                    @hasanyrole('DELETE_TT|supper-admin')
                                        {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-xs',
                                            'onclick' => "return confirm('Are you sure?')",
                                        ]) !!}
                                    @endhasanyrole
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
    </div>
</div>
