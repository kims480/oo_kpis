<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/snagdomains.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<!-- Note Field -->
<div class="form-group col-sm-6">
    {!! Form::label('note', __('models/snagdomains.fields.note').':') !!}
    {!! Form::text('note', null, ['class' => 'form-control']) !!}
</div>
