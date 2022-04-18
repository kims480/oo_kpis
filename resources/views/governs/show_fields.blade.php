<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/governs.fields.name').':') !!}
    <p>{{ $govern->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/governs.fields.created_at').':') !!}
    <p>{{ $govern->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/governs.fields.updated_at').':') !!}
    <p>{{ $govern->updated_at }}</p>
</div>

