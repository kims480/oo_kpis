<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/otcAlarms.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Add By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('add_by', __('models/otcAlarms.fields.add_by').':') !!}
    {!! Form::select('add_by', \App\Models\User::select("id", "name")->get()->pluck('name', 'id') , \Auth::user()->id, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Details Field -->
<div class="form-group col-sm-6">
    {!! Form::label('details', __('models/otcAlarms.fields.details').':') !!}
    {!! Form::text('details', null, ['class' => 'form-control']) !!}
</div>

<!-- Categ Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categ_id', __('models/otcAlarms.fields.categ_id').':') !!}
    {!! Form::select('categ_id', \App\Models\OtcCateg::select("id", "name")->get()->pluck('name', 'id') , null, ['class' => 'form-control custom-select']) !!}


</div>


<!-- Notes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('notes', __('models/otcAlarms.fields.notes').':') !!}
    {!! Form::text('notes', null, ['class' => 'form-control']) !!}
</div>
