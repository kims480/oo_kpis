<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/tickets.fields.id') . ':') !!}
    <p>{{ $ticket->id }}</p>
</div>

<!-- Site Id Field -->
<div class="col-sm-12">
    {!! Form::label('site_id', __('models/tickets.fields.site_id') . ':') !!}
    <p>{{ $ticket->site_id }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/tickets.fields.description') . ':') !!}
    <p>{{ $ticket->description }}</p>
</div>

<!-- Categ Field -->
<div class="col-sm-12">
    {!! Form::label('categ', __('models/tickets.fields.categ') . ':') !!}
    <p>{{ $ticket->categ }}</p>
</div>

<!-- Contractor Field -->
<div class="col-sm-12">
    {!! Form::label('contractor', __('models/tickets.fields.contractor') . ':') !!}
    <p>{{ $ticket->contractor }}</p>
</div>

<!-- Scope Field -->
<div class="col-sm-12">
    {!! Form::label('scope', __('models/tickets.fields.scope') . ':') !!}
    <p>{{ $ticket->scope }}</p>
</div>

<!-- Tt Number Field -->
<div class="col-sm-12">
    {!! Form::label('tt_number', __('models/tickets.fields.tt_number') . ':') !!}
    <p>{{ $ticket->tt_number }}</p>
</div>

<!-- Notes Field -->
<div class="col-sm-12">
    {!! Form::label('notes', __('models/tickets.fields.notes') . ':') !!}
    <p>{{ $ticket->notes }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/tickets.fields.created_at') . ':') !!}
    <p>{{ $ticket->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/tickets.fields.updated_at') . ':') !!}
    <p>{{ $ticket->updated_at }}</p>
</div>

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
