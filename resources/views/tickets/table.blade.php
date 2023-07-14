<div class="table-responsive">
    <table class="table" id="tickets-table">
        <thead>
        <tr>
            <th>@lang('models/tickets.fields.tt_number')</th>
        <th>@lang('models/tickets.fields.site_id')</th>
        <th>@lang('models/tickets.fields.alarm_name')</th>
        <th>@lang('models/tickets.fields.description')</th>
        <th>@lang('models/tickets.fields.categ')</th>
        <th>@lang('models/tickets.fields.contractor')</th>
        <th>@lang('models/tickets.fields.scope')</th>

        <th>@lang('models/tickets.fields.created_at')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
            @php
                // dd($tickets);
            @endphp
            @isset($tickets)


         @foreach($tickets as $ticket)
            <tr>
            <td>{{ $ticket->tt_number }}</td>
            <td>{{ $ticket->site->site_id }}</td>
            <td>{{ $ticket->alarm->name }}</td>
            <td>{{ $ticket->description }}</td>
            <td>{{ $ticket->tt_categ->name }}</td>
            <td>{{ $ticket->tt_contractor->name }}</td>
            <td>{{ $ticket->tt_scope->name }}</td>

            <td>{{ $ticket->created_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['tickets.destroy', $ticket->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tickets.show', [$ticket->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        @can('tickets.edit')

                        <a href="{{ route('tickets.edit', [$ticket->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        @endcan
                        @can('tickets.destroy')

                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>

         @endforeach
         @endisset
        </tbody>
    </table>
</div>
