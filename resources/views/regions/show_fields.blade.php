<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/regions.fields.id').':') !!}
    <p>{{ $region->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/regions.fields.name').':') !!}
    <p>{{ $region->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/regions.fields.created_at').':') !!}
    <p>{{ $region->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/regions.fields.updated_at').':') !!}
    <p>{{ $region->updated_at }}</p>
</div>

