<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/contractors.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Info Field -->
<div class="form-group col-sm-6">
    {!! Form::label('info', __('models/contractors.fields.info').':') !!}
    {!! Form::text('info', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', __('models/contractors.fields.address').':') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Lat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lat', __('models/contractors.fields.lat').':') !!}
    {!! Form::text('lat', null, ['class' => 'form-control']) !!}
</div>

<!-- Long Field -->
<div class="form-group col-sm-6">
    {!! Form::label('long', __('models/contractors.fields.long').':') !!}
    {!! Form::text('long', null, ['class' => 'form-control']) !!}
</div>

<!-- Added By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('added_by', __('models/contractors.fields.added_by').':') !!}
    {!! Form::select('added_by', \App\Models\User::select("id", "name")->get()->pluck('name', 'id') , \Auth::user()->id, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Register Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('register_number', __('models/contractors.fields.register_number').':') !!}
    {!! Form::text('register_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Website Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('website', __('models/contractors.fields.website').':') !!}
    {!! Form::textarea('website', null, ['class' => 'form-control']) !!}
</div>

<!-- Info Mail Field -->
<div class="form-group col-sm-6">
    {!! Form::label('info_mail', __('models/contractors.fields.info_mail').':') !!}
    {!! Form::email('info_mail', null, ['class' => 'form-control']) !!}
</div>

<!-- It Mail Field -->
<div class="form-group col-sm-6">
    {!! Form::label('it_mail', __('models/contractors.fields.it_mail').':') !!}
    {!! Form::text('it_mail', null, ['class' => 'form-control']) !!}
</div>

<!-- Proc Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('proc_email', __('models/contractors.fields.proc_email').':') !!}
    {!! Form::text('proc_email', null, ['class' => 'form-control']) !!}
</div>

<!-- Operation Mail Field -->
<div class="form-group col-sm-6">
    {!! Form::label('operation_mail', __('models/contractors.fields.operation_mail').':') !!}
    {!! Form::text('operation_mail', null, ['class' => 'form-control']) !!}
</div>

<!-- Admin Mail Field -->
<div class="form-group col-sm-6">
    {!! Form::label('admin_mail', __('models/contractors.fields.admin_mail').':') !!}
    {!! Form::text('admin_mail', null, ['class' => 'form-control']) !!}
</div>

<!-- Ceo Mail Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ceo_mail', __('models/contractors.fields.ceo_mail').':') !!}
    {!! Form::text('ceo_mail', null, ['class' => 'form-control']) !!}
</div>

<!-- Project Manager Mail Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_manager_mail', __('models/contractors.fields.project_manager_mail').':') !!}
    {!! Form::text('project_manager_mail', null, ['class' => 'form-control']) !!}
</div>
