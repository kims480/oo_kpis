<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/sitePrios.fields.id').':') !!}
    <p>{{ $sitePrio->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/sitePrios.fields.name').':') !!}
    <p>{{ $sitePrio->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/sitePrios.fields.created_at').':') !!}
    <p>{{ $sitePrio->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/sitePrios.fields.updated_at').':') !!}
    <p>{{ $sitePrio->updated_at }}</p>
</div>

