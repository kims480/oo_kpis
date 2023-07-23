<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/titles.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Details Field -->
<div class="form-group col-sm-6">
    {!! Form::label('details', __('models/titles.fields.details').':') !!}
    {!! Form::text('details', null, ['class' => 'form-control']) !!}
</div>