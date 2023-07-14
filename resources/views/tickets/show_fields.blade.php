<table class='table' id='tickets-table'>
    <tbody>
        <tr>
            <th>{{__('models/tickets.fields.tt_number')}}</th>
            <td>{{$ticket->tt_number}}</td>
            <th>{{__('models/tickets.fields.site_id')}}</th>
            <td>{{ $ticket->site->site_id }}</td>
        </tr>
        <tr>
            <th>{{__('models/tickets.fields.alarm_name')}}</th>
            <td>{{ $ticket->alarm->name }}</td>
            <th>{{__('models/tickets.fields.description')}}</th>
            <td>{{ $ticket->description }}</td>
        </tr>
        <tr>
            <th>{{__('models/tickets.fields.categ')}}</th>
            <td>{{ $ticket->tt_categ->name }}</td>
            <th>{{__('models/tickets.fields.contractor')}}</th>
            <td>{{ $ticket->tt_contractor->name }}</td>
        </tr>
        <tr>
            <th>{{__('models/tickets.fields.scope')}}</th>
            <td>{{ $ticket->tt_scope->name }}</td>
            <th>{{__('models/tickets.fields.created_at')}}</th>
            <td>{{ $ticket->created_at }}</td>
        </tr>
    </tbody>
</table>
