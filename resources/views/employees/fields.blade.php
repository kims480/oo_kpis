<div class="w-full flex xs:flex-col sm:flex-col  md:flex-row gap-2 mb-1">
    <!-- civil_id Field -->
    <div class="form-group flex flex-col ">
        {!! Form::label('civil_id', __('models/employees.fields.civil_id') . ':') !!}
        {!! Form::text('civil_id', null, ['class' => 'form-control']) !!}
    </div>
    <!-- hr_code Field -->
    <div class="form-group flex flex-col ">
        {!! Form::label('hr_code', __('models/employees.fields.hr_code') . ':') !!}
        {!! Form::text('hr_code', null, ['class' => 'form-control']) !!}
    </div>
</div>
<!-- first_name Field -->
<div class="w-full flex xs:flex-col sm:flex-col  md:flex-row gap-2 mb-1">

    <div class="form-group flex flex-col">
        {!! Form::label('first_name', __('models/employees.fields.first_name') . ':') !!}
        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- mid_name Field -->
    <div class="form-group flex flex-col">
        {!! Form::label('mid_name', __('models/employees.fields.mid_name') . ':') !!}
        {!! Form::text('mid_name', null, ['class' => 'form-control']) !!}
    </div>
    <!-- last_name Field -->
    <div class="form-group flex flex-col">
        {!! Form::label('last_name', __('models/employees.fields.last_name') . ':') !!}
        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="w-full flex xs:flex-col sm:flex-col  md:flex-row gap-2 mb-1">

    <!-- email Field -->
    <div class="form-group flex flex-col">
        {!! Form::label('email', __('models/employees.fields.email') . ':') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
    <!-- phone Field -->
    <div class="form-group flex flex-col">
        {!! Form::label('phone', __('models/employees.fields.phone') . ':') !!}
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    </div>
    <!-- password Field -->
    <div class="form-group flex flex-col">
        {!! Form::label('password', __('models/employees.fields.password') . ':') !!}
        {!! Form::password('password', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="w-full flex xs:flex-col sm:flex-col  md:flex-row gap-2 mb-1">
    <!-- project_id Field -->
    <div class="form-group flex flex-col">
        {!! Form::label('project_id', __('models/employees.fields.project_id') . ':') !!}

        {!! Form::select(
            'project_id',
            App\Models\AlkanProject::select('id', 'project_name')->pluck('project_name', 'id'),
            null,
            ['class' => 'form-control custom-select'],
        ) !!}
    </div>
    <!-- dept_id Field -->
    <div class="form-group flex flex-col">
        {!! Form::label('dept_id', __('models/employees.fields.dept_id') . ':') !!}
        {!! Form::select('dept_id', App\Models\Department::select('id', 'name')->pluck('name', 'id'), null, [
            'class' => 'form-control custom-select',
        ]) !!}
    </div>
    <!-- designation_id Field -->
    <div class="form-group flex flex-col">
        {!! Form::label('designation_id', __('models/employees.fields.designation_id') . ':') !!}
        {!! Form::select('designation_id', App\Models\Designation::select('id', 'name')->pluck('name', 'id'), null, [
            'class' => 'form-control custom-select',
        ]) !!}
    </div>
    <!-- title_id Field -->
    <div class="form-group flex flex-col">
        {!! Form::label('title_id', __('models/employees.fields.title_id') . ':') !!}
        {!! Form::select('title_id', App\Models\Title::select('id', 'name')->pluck('name', 'id'), null, [
            'class' => 'form-control custom-select',
        ]) !!}
    </div>
</div>

<div class="w-full flex xs:flex-col sm:flex-col  md:flex-row gap-2 mb-1">
    <!-- office_id Field -->
    <div class="form-group flex flex-col">
        {!! Form::label('office_id', __('models/employees.fields.office_id') . ':') !!}
        {!! Form::select('office_id', App\Models\Office::select('id', 'name')->pluck('name', 'id'), null, [
            'class' => 'form-control custom-select',
        ]) !!}
    </div>
    <!-- gender Field -->
    <div class="form-group flex flex-col">
        {!! Form::label('gender', __('models/employees.fields.gender') . ':') !!}
        {!! Form::select('gender', [1 => 'Male', 0 => 'Female'], 1, ['class' => 'form-control custom-select']) !!}
    </div>
</div>

<div class="w-full flex xs:flex-col sm:flex-col  md:flex-row gap-2 mb-1">

    <!-- hiring_date Field -->
    <div class="form-group flex flex-col">
        {!! Form::label('hiring_date', __('models/employees.fields.hiring_date') . ':') !!}
        {!! Form::date('hiring_date', '01-01-2015', null, ['class' => 'form-control']) !!}
    </div>
    <!-- salary Field -->
    <div class="form-group flex flex-col">
        {!! Form::label('salary', __('models/employees.fields.salary') . ':') !!}
        {!! Form::number('salary', 300.0, null, ['class' => 'form-control']) !!}
    </div>
</div>
