<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/wilayats.fields.name').':') !!}
    <p>{{ $wilayat->name }}</p>
</div>

<!-- Region Id Field -->
<div class="col-sm-12">
    {!! Form::label('govern_id', __('models/wilayats.fields.govern_id').':') !!}
    <p>{{ $wilayat->govern_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/wilayats.fields.created_at').':') !!}
    <p>{{ $wilayat->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/wilayats.fields.updated_at').':') !!}
    <p>{{ $wilayat->updated_at }}</p>
</div>

