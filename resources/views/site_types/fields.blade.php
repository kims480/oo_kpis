<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', __('models/siteTypes.fields.id').':') !!}
    {!! Form::text('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/siteTypes.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>