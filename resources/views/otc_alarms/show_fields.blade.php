<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/otcAlarms.fields.id').':') !!}
    <p>{{ $otcAlarms->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/otcAlarms.fields.name').':') !!}
    <p>{{ $otcAlarms->name }}</p>
</div>

<!-- Add By Field -->
<div class="col-sm-12">
    {!! Form::label('add_by', __('models/otcAlarms.fields.add_by').':') !!}
    <p>{{ $otcAlarms->add_by }}</p>
</div>

<!-- Details Field -->
<div class="col-sm-12">
    {!! Form::label('details', __('models/otcAlarms.fields.details').':') !!}
    <p>{{ $otcAlarms->details }}</p>
</div>

<!-- Categ Id Field -->
<div class="col-sm-12">
    {!! Form::label('categ_id', __('models/otcAlarms.fields.categ_id').':') !!}
    <p>{{ $otcAlarms->categ_id }}</p>
</div>

<!-- Notes Field -->
<div class="col-sm-12">
    {!! Form::label('notes', __('models/otcAlarms.fields.notes').':') !!}
    <p>{{ $otcAlarms->notes }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/otcAlarms.fields.created_at').':') !!}
    <p>{{ $otcAlarms->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/otcAlarms.fields.updated_at').':') !!}
    <p>{{ $otcAlarms->updated_at }}</p>
</div>

