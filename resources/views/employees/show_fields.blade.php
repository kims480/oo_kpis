<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/employees.fields.id').':') !!}
    <p>{{ $employee->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/employees.fields.name').':') !!}
    <p>{{ $employee->name }}</p>
</div>

<!-- Details Field -->
<div class="col-sm-12">
    {!! Form::label('details', __('models/employees.fields.details').':') !!}
    <p>{{ $employee->details }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/employees.fields.created_at').':') !!}
    <p>{{ $employee->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/employees.fields.updated_at').':') !!}
    <p>{{ $employee->updated_at }}</p>
</div>

