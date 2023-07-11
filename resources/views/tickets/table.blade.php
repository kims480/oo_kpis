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
         @foreach($tickets as $ticket)
            <tr>
            <td>{{ $ticket->tt_number }}</td>
            <td>{{ $ticket->site_id }}</td>
            <td>{{ $ticket->alarm_name }}</td>
            <td>{{ $ticket->description }}</td>
            <td>{{ $ticket->categ }}</td>
            <td>{{ $ticket->contractor }}</td>
            <td>{{ $ticket->scope }}</td>

            <td>{{ $ticket->created_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['tickets.destroy', $ticket->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tickets.show', [$ticket->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('tickets.edit', [$ticket->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
         @endforeach
        </tbody>
    </table>
</div>