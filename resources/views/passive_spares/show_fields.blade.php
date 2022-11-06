<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/passiveSpares.fields.id').':') !!}
    <p>{{ $passiveSpare->id }}</p>
</div>

<!-- Old Bom Field -->
<div class="col-sm-12">
    {!! Form::label('old_bom', __('models/passiveSpares.fields.old_bom').':') !!}
    <p>{{ $passiveSpare->old_bom }}</p>
</div>

<!-- New Bom Field -->
<div class="col-sm-12">
    {!! Form::label('new_bom', __('models/passiveSpares.fields.new_bom').':') !!}
    <p>{{ $passiveSpare->new_bom }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/passiveSpares.fields.description').':') !!}
    <p>{{ $passiveSpare->description }}</p>
</div>

<!-- Uom Field -->
<div class="col-sm-12">
    {!! Form::label('uom', __('models/passiveSpares.fields.uom').':') !!}
    <p>{{ $passiveSpare->uom }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/passiveSpares.fields.created_at').':') !!}
    <p>{{ $passiveSpare->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/passiveSpares.fields.updated_at').':') !!}
    <p>{{ $passiveSpare->updated_at }}</p>
</div>

<!-- Important Field -->
<div class="col-sm-12">
    {!! Form::label('Important', __('models/passiveSpares.fields.Important').':') !!}
    <p>{{ $passiveSpare->Important }}</p>
</div>

<!-- High Consumption Field -->
<div class="col-sm-12">
    {!! Form::label('high_consumption', __('models/passiveSpares.fields.high_consumption').':') !!}
    <p>{{ $passiveSpare->high_consumption }}</p>
</div>

