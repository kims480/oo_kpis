<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', __('models/otcCategs.fields.id').':') !!}
    {!! Form::text('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/otcCategs.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Add By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('add_by', __('models/otcCategs.fields.add_by').':') !!}
    {!! Form::select('add_by', \App\Models\User::select("id", "name")->get()->pluck('name', 'id') , \Auth::user()->id, ['class' => 'form-control custom-select']) !!}

</div>


<!-- Details Field -->
<div class="form-group col-sm-6">
    {!! Form::label('details', __('models/otcCategs.fields.details').':') !!}
    {!! Form::text('details', null, ['class' => 'form-control']) !!}
</div>

<!-- Notes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('notes', __('models/otcCategs.fields.notes').':') !!}
    {!! Form::text('notes', null, ['class' => 'form-control']) !!}
</div>
