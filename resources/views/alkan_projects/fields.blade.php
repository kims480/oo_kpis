<!-- Project Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_name', __('models/alkanProjects.fields.project_name').':') !!}
    {!! Form::text('project_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Alkan Project Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alkan_project_code', __('models/alkanProjects.fields.alkan_project_code').':') !!}
    {!! Form::text('alkan_project_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Customer Project Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_project_code', __('models/alkanProjects.fields.customer_project_code').':') !!}
    {!! Form::text('customer_project_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Project Detail Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_detail', __('models/alkanProjects.fields.project_detail').':') !!}
    {!! Form::text('project_detail', null, ['class' => 'form-control']) !!}
</div>