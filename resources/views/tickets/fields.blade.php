
<!-- Site Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('site_id', __('models/tickets.fields.site_id').':') !!}
    {!! Form::number('site_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Categ Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categ', __('models/tickets.fields.categ').':') !!}
    {!! Form::text('categ', null, ['class' => 'form-control']) !!}
</div>

<!-- Categ Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/tickets.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Contractor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contractor', __('models/tickets.fields.contractor').':') !!}
    {!! Form::text('contractor', null, ['class' => 'form-control']) !!}
</div>

<!-- Scope Field -->
<div class="form-group col-sm-6">
    {!! Form::label('scope', __('models/tickets.fields.scope').':') !!}
    {!! Form::text('scope', null, ['class' => 'form-control']) !!}
</div>

<!-- Notes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('notes', __('models/tickets.fields.notes').':') !!}
    {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
</div>
