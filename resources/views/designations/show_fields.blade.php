<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/designations.fields.id').':') !!}
    <p>{{ $designation->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/designations.fields.name').':') !!}
    <p>{{ $designation->name }}</p>
</div>

<!-- Details Field -->
<div class="col-sm-12">
    {!! Form::label('details', __('models/designations.fields.details').':') !!}
    <p>{{ $designation->details }}</p>
</div>

<!-- Create By Field -->
<div class="col-sm-12">
    {!! Form::label('create_by', __('models/designations.fields.create_by').':') !!}
    <p>{{ $designation->create_by }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/designations.fields.created_at').':') !!}
    <p>{{ $designation->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/designations.fields.updated_at').':') !!}
    <p>{{ $designation->updated_at }}</p>
</div>

