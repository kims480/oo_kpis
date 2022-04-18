<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/siteTypes.fields.id').':') !!}
    <p>{{ $siteType->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/siteTypes.fields.name').':') !!}
    <p>{{ $siteType->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/siteTypes.fields.created_at').':') !!}
    <p>{{ $siteType->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/siteTypes.fields.updated_at').':') !!}
    <p>{{ $siteType->updated_at }}</p>
</div>

