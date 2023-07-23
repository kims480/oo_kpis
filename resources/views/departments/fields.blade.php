<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/departments.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Details Field -->
<div class="form-group col-sm-6">
    {!! Form::label('details', __('models/departments.fields.details').':') !!}
    {!! Form::text('details', null, ['class' => 'form-control']) !!}
</div>

<!-- Created By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_by', __('models/departments.fields.created_by').':') !!}
    {!! Form::select('created_by', \app\Models\User::select('id','name')->pluck('name','id'), null, ['class' => 'form-control custom-select']) !!}

</div>
