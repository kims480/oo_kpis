<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/snagreporters.fields.id').':') !!}
    <p>{{ $snagreporter->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/snagreporters.fields.name').':') !!}
    <p>{{ $snagreporter->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/snagreporters.fields.created_at').':') !!}
    <p>{{ $snagreporter->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/snagreporters.fields.updated_at').':') !!}
    <p>{{ $snagreporter->updated_at }}</p>
</div>

