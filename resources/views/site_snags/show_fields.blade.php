<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/siteSnags.fields.id').':') !!}
    <p>{{ $siteSnag->id }}</p>
</div>

<!-- Site Id Field -->
<div class="col-sm-12">
    {!! Form::label('site_id', __('models/siteSnags.fields.site_id').':') !!}
    <p>{{ $siteSnag->site_id }}</p>
</div>

<!-- Snagmangs Field -->
<div class="col-sm-12">
    {!! Form::label('snagmangs', __('models/siteSnags.fields.snagmangs').':') !!}
    <p>{{ $siteSnag->snagmangs }}</p>
</div>

