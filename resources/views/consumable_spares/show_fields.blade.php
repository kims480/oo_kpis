<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/consumableSpares.fields.id').':') !!}
    <p>{{ $consumableSpare->id }}</p>
</div>

<!-- Old Bom Field -->
<div class="col-sm-12">
    {!! Form::label('old_bom', __('models/consumableSpares.fields.old_bom').':') !!}
    <p>{{ $consumableSpare->old_bom }}</p>
</div>

<!-- New Bom Field -->
<div class="col-sm-12">
    {!! Form::label('new_bom', __('models/consumableSpares.fields.new_bom').':') !!}
    <p>{{ $consumableSpare->new_bom }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/consumableSpares.fields.description').':') !!}
    <p>{{ $consumableSpare->description }}</p>
</div>

<!-- Uom Field -->
<div class="col-sm-12">
    {!! Form::label('uom', __('models/consumableSpares.fields.uom').':') !!}
    <p>{{ $consumableSpare->uom }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/consumableSpares.fields.created_at').':') !!}
    <p>{{ $consumableSpare->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/consumableSpares.fields.updated_at').':') !!}
    <p>{{ $consumableSpare->updated_at }}</p>
</div>

<!-- Important Field -->
<div class="col-sm-12">
    {!! Form::label('Important', __('models/consumableSpares.fields.Important').':') !!}
    <p>{{ $consumableSpare->Important }}</p>
</div>

<!-- High Consumption Field -->
<div class="col-sm-12">
    {!! Form::label('high_consumption', __('models/consumableSpares.fields.high_consumption').':') !!}
    <p>{{ $consumableSpare->high_consumption }}</p>
</div>

