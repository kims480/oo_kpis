<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/designations.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Details Field -->
<div class="form-group col-sm-6">
    {!! Form::label('details', __('models/designations.fields.details').':') !!}
    {!! Form::text('details', null, ['class' => 'form-control']) !!}
</div>

<!-- Create By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('create_by', __('models/designations.fields.create_by').':') !!}
    {!! Form::select('create_by', \app\Models\User::select('id','name')->pluck('name','id'), null, ['class' => 'form-control custom-select']) !!}
</div>
