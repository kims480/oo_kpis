<!-- Report Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('report_date', __('models/snagmangs.fields.report_date').':') !!}
    {!! Form::text('report_date', null, ['class' => 'form-control','id'=>'report_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#report_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Site Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('site_id', __('models/snagmangs.fields.site_id').':') !!}
    {!! Form::text('site_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Region Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('region_id', __('models/snagmangs.fields.region_id').':') !!}
    {!! Form::text('region_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Office Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('office_id', __('models/snagmangs.fields.office_id').':') !!}
    {!! Form::text('office_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/snagmangs.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Main Categ Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('main_categ_id', __('models/snagmangs.fields.main_categ_id').':') !!}
    {!! Form::text('main_categ_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Sub Categ Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_categ_id', __('models/snagmangs.fields.sub_categ_id').':') !!}
    {!! Form::text('sub_categ_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Domain Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('domain_id', __('models/snagmangs.fields.domain_id').':') !!}
    {!! Form::text('domain_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Snag Remark Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('snag_remark_id', __('models/snagmangs.fields.snag_remark_id').':') !!}
    {!! Form::text('snag_remark_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Snag Reported Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('snag_reported_id', __('models/snagmangs.fields.snag_reported_id').':') !!}
    {!! Form::text('snag_reported_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Closure Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('closure_date', __('models/snagmangs.fields.closure_date').':') !!}
    {!! Form::text('closure_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Snag Closed By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('snag_closed_by', __('models/snagmangs.fields.snag_closed_by').':') !!}
    {!! Form::text('snag_closed_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Remarks Field -->
<div class="form-group col-sm-6">
    {!! Form::label('remarks', __('models/snagmangs.fields.remarks').':') !!}
    {!! Form::text('remarks', null, ['class' => 'form-control']) !!}
</div>