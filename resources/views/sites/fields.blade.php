<div class="form-row">
<!-- Site Id Field -->
<div class="form-group col-md-4 col-sm-12 mb-3">
    {!! Form::label('site_id', __('models/sites.fields.site_id').':') !!}
    {!! Form::text('site_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Lat Field -->
<div class="form-group col-md-4 col-sm-12">
    {!! Form::label('lat', __('models/sites.fields.lat').':') !!}
    {!! Form::text('lat', null, ['class' => 'form-control']) !!}
</div>

<!-- Long Field -->
<div class="form-group col-md-4 col-sm-12">
    {!! Form::label('long', __('models/sites.fields.long').':') !!}
    {!! Form::text('long', null, ['class' => 'form-control']) !!}
</div>
</div>


<div class="form-row">
<!-- Nis Field -->
<div class="form-group col-md-4 col-sm-12">
    {!! Form::label('nis', __('models/sites.fields.nis').':') !!}
    {!! Form::text('nis', null, ['class' => 'form-control']) !!}
</div>

<!-- Prio Field -->
<div class="form-group col-md-4 col-sm-12">
    {!! Form::label('prio', __('models/sites.fields.prio').':') !!}
    {!! Form::text('prio', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-md-4 col-sm-12">
    {!! Form::label('type', __('models/sites.fields.type').':') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class="form-row">
<!-- Categ Field -->
<div class="form-group col-md-6 col-sm-12">
    {!! Form::label('categ', __('models/sites.fields.categ').':') !!}
    {!! Form::text('categ', null, ['class' => 'form-control']) !!}
</div>
<!-- Office Field -->
<div class="form-group col-md-6 col-sm-12">
    {!! Form::label('office', __('models/sites.fields.office_id').':') !!}
    {!! Form::text('office_id', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class="form-row">

<!-- Govern Field -->
@livewire('parent-child', [
    'parentModelName' => 'App\\Models\\Govern',
    'parentLabel' => 'Governate',
    'parentInputName' => 'govern_id',
    'childModelName' => 'App\\Models\\Wilayat',
    'childLabel' => 'Wilayat',
    'childInputName' => 'wilayat_id',
    'relationshipFieldName' => 'govern_id',
    ])
{{-- <div class="form-group col-sm-12">
    {!! Form::label('govern', __('models/sites.fields.govern_id').':') !!}
    {!! Form::text('govern_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Wilayat Field -->
<div class="form-group col-sm-12">
    {!! Form::label('wilayat', __('models/sites.fields.wilayat_id').':') !!}
    {!! Form::text('wilayat_id', null, ['class' => 'form-control']) !!}
</div> --}}

</div>

<!-- Address Field -->
<div class="form-group col-sm-12">
    {!! Form::label('address', __('models/sites.fields.address').':') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>
