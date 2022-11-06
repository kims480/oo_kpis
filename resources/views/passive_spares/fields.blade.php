<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', __('models/passiveSpares.fields.id').':') !!}
    {!! Form::text('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Old Bom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('old_bom', __('models/passiveSpares.fields.old_bom').':') !!}
    {!! Form::text('old_bom', null, ['class' => 'form-control']) !!}
</div>

<!-- New Bom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('new_bom', __('models/passiveSpares.fields.new_bom').':') !!}
    {!! Form::text('new_bom', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/passiveSpares.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Uom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uom', __('models/passiveSpares.fields.uom').':') !!}
    {!! Form::text('uom', null, ['class' => 'form-control']) !!}
</div>

<!-- Important Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Important', __('models/passiveSpares.fields.Important').':') !!}
    {!! Form::text('Important', null, ['class' => 'form-control']) !!}
</div>

<!-- High Consumption Field -->
<div class="form-group col-sm-6">
    {!! Form::label('high_consumption', __('models/passiveSpares.fields.high_consumption').':') !!}
    {!! Form::text('high_consumption', null, ['class' => 'form-control']) !!}
</div>