<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/snagstatuses.fields.id').':') !!}
    <p>{{ $snagstatus->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/snagstatuses.fields.name').':') !!}
    <p>{{ $snagstatus->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/snagstatuses.fields.created_at').':') !!}
    <p>{{ $snagstatus->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/snagstatuses.fields.updated_at').':') !!}
    <p>{{ $snagstatus->updated_at }}</p>
</div>

