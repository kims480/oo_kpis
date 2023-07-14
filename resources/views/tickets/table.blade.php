<div class="w-full lg:w-5/6">
    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-max w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">

                    <th class="py-3 px-6 text-center">@lang('models/tickets.fields.tt_number')</th>
                    <th class="py-3 px-6 text-left">@lang('models/tickets.fields.site_id')</th>
                    <th class="py-3 px-6 text-center">@lang('models/tickets.fields.alarm_name')</th>
                    <th class="py-3 px-6 text-center">@lang('models/tickets.fields.description')</th>
                    <th class="py-3 px-6 text-center">@lang('models/tickets.fields.categ')</th>
                    <th class="py-3 px-6 text-center">@lang('models/tickets.fields.contractor')</th>
                    <th class="py-3 px-6 text-center">@lang('models/tickets.fields.status')</th>

                    <th class="py-3 px-6 text-center">@lang('models/tickets.fields.created_at')</th>
                    <th class="py-3 px-6 text-center" colspan="2">@lang('crud.action')</th>
                </tr>
            </thead>

            <tbody class="text-gray-600 text-sm font-light">
                @php
                    // dd($tickets);
                @endphp
                @isset($tickets)


                    @foreach ($tickets as $ticket)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap"><span class="font-medium">{{ $ticket->tt_number }}</span></td>
                            <td ؤlass="py-3 px-6 text-left">{{ $ticket->site->site_id }}</td>
                            <td class="py-3 px-6 text-center">{{ $ticket->alarm->name }}</td>
                            <td class="py-3 px-6 text-center">{{ $ticket->description }}</td>
                            <td class="py-3 px-6 text-center">{{ $ticket->tt_categ->name }}</td>
                            <td class="py-3 px-6 text-center">{{ $ticket->tt_contractor->name }}</td>
                            <td class="py-3 px-6 text-center">{{ $ticket->status }}</td>

                            <td class="py-3 px-6 text-center">{{ $ticket->created_at }}</td>
                            <td class="py-3 px-6 text-center" colspan="2">
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
                                    @role('DELETE_TT')
                                        {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-xs',
                                            'onclick' => "return confirm('Are you sure?')",
                                        ]) !!}
                                    @endrole
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
    </div>
