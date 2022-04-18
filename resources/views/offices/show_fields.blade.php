<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/offices.fields.id').':') !!}
    <p>{{ $office->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/offices.fields.name').':') !!}
    <p>{{ $office->name }}</p>
</div>

<!-- Region Id Field -->
<div class="col-sm-12">
    {!! Form::label('region_id', __('models/offices.fields.region_id').':') !!}
    <p>{{ $office->region_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/offices.fields.created_at').':') !!}
    <p>{{ $office->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/offices.fields.updated_at').':') !!}
    <p>{{ $office->updated_at }}</p>
</div>

