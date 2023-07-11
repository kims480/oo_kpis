<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/otcSites.fields.created_at').':') !!}
    <p>{{ $otcSites->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/otcSites.fields.updated_at').':') !!}
    <p>{{ $otcSites->updated_at }}</p>
</div>

