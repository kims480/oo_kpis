<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/otcCategs.fields.id').':') !!}
    <p>{{ $otcCateg->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/otcCategs.fields.name').':') !!}
    <p>{{ $otcCateg->name }}</p>
</div>

<!-- Add By Field -->
<div class="col-sm-12">
    {!! Form::label('add_by', __('models/otcCategs.fields.add_by').':') !!}
    <p>{{ $otcCateg->add_by }}</p>
</div>

<!-- Details Field -->
<div class="col-sm-12">
    {!! Form::label('details', __('models/otcCategs.fields.details').':') !!}
    <p>{{ $otcCateg->details }}</p>
</div>

<!-- Notes Field -->
<div class="col-sm-12">
    {!! Form::label('notes', __('models/otcCategs.fields.notes').':') !!}
    <p>{{ $otcCateg->notes }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/otcCategs.fields.created_at').':') !!}
    <p>{{ $otcCateg->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/otcCategs.fields.updated_at').':') !!}
    <p>{{ $otcCateg->updated_at }}</p>
</div>

