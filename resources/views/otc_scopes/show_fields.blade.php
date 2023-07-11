<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/otcScopes.fields.id').':') !!}
    <p>{{ $otcScope->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/otcScopes.fields.name').':') !!}
    <p>{{ $otcScope->name }}</p>
</div>

<!-- Details Field -->
<div class="col-sm-12">
    {!! Form::label('details', __('models/otcScopes.fields.details').':') !!}
    <p>{{ $otcScope->details }}</p>
</div>

<!-- Add By Field -->
<div class="col-sm-12">
    {!! Form::label('add_by', __('models/otcScopes.fields.add_by').':') !!}
    <p>{{ $otcScope->add_by }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/otcScopes.fields.created_at').':') !!}
    <p>{{ $otcScope->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/otcScopes.fields.updated_at').':') !!}
    <p>{{ $otcScope->updated_at }}</p>
</div>

