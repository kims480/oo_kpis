<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/alkanProjects.fields.id').':') !!}
    <p>{{ $alkanProject->id }}</p>
</div>

<!-- Project Name Field -->
<div class="col-sm-12">
    {!! Form::label('project_name', __('models/alkanProjects.fields.project_name').':') !!}
    <p>{{ $alkanProject->project_name }}</p>
</div>

<!-- Alkan Project Code Field -->
<div class="col-sm-12">
    {!! Form::label('alkan_project_code', __('models/alkanProjects.fields.alkan_project_code').':') !!}
    <p>{{ $alkanProject->alkan_project_code }}</p>
</div>

<!-- Customer Project Code Field -->
<div class="col-sm-12">
    {!! Form::label('customer_project_code', __('models/alkanProjects.fields.customer_project_code').':') !!}
    <p>{{ $alkanProject->customer_project_code }}</p>
</div>

<!-- Project Detail Field -->
<div class="col-sm-12">
    {!! Form::label('project_detail', __('models/alkanProjects.fields.project_detail').':') !!}
    <p>{{ $alkanProject->project_detail }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/alkanProjects.fields.created_at').':') !!}
    <p>{{ $alkanProject->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/alkanProjects.fields.updated_at').':') !!}
    <p>{{ $alkanProject->updated_at }}</p>
</div>

