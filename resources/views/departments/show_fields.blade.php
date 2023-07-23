<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/departments.fields.id').':') !!}
    <p>{{ $department->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/departments.fields.name').':') !!}
    <p>{{ $department->name }}</p>
</div>

<!-- Details Field -->
<div class="col-sm-12">
    {!! Form::label('details', __('models/departments.fields.details').':') !!}
    <p>{{ $department->details }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', __('models/departments.fields.created_by').':') !!}
    <p>{{ $department->created_by }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/departments.fields.created_at').':') !!}
    <p>{{ $department->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/departments.fields.updated_at').':') !!}
    <p>{{ $department->updated_at }}</p>
</div>

