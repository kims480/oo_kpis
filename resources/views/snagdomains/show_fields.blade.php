<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/snagdomains.fields.id').':') !!}
    <p>{{ $snagdomain->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/snagdomains.fields.name').':') !!}
    <p>{{ $snagdomain->name }}</p>
</div>

<!-- note Field -->
<div class="col-sm-12">
    {!! Form::label('note', __('models/snagdomains.fields.note').':') !!}
    <p>{{ $snagdomain->note }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/snagdomains.fields.created_at').':') !!}
    <p>{{ $snagdomain->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/snagdomains.fields.updated_at').':') !!}
    <p>{{ $snagdomain->updated_at }}</p>
</div>

