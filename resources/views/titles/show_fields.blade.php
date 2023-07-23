<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/titles.fields.id').':') !!}
    <p>{{ $title->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/titles.fields.name').':') !!}
    <p>{{ $title->name }}</p>
</div>

<!-- Details Field -->
<div class="col-sm-12">
    {!! Form::label('details', __('models/titles.fields.details').':') !!}
    <p>{{ $title->details }}</p>
</div>

