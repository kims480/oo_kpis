<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/siteCategs.fields.id').':') !!}
    <p>{{ $siteCateg->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/siteCategs.fields.name').':') !!}
    <p>{{ $siteCateg->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/siteCategs.fields.created_at').':') !!}
    <p>{{ $siteCateg->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/siteCategs.fields.updated_at').':') !!}
    <p>{{ $siteCateg->updated_at }}</p>
</div>

