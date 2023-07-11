<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/alarmCategs.fields.id').':') !!}
    <p>{{ $alarmCateg->id }}</p>
</div>

<!-- Categ Name Field -->
<div class="col-sm-12">
    {!! Form::label('categ_name', __('models/alarmCategs.fields.categ_name').':') !!}
    <p>{{ $alarmCateg->categ_name }}</p>
</div>

<!-- Added By Field -->
<div class="col-sm-12">
    {!! Form::label('added_by', __('models/alarmCategs.fields.added_by').':') !!}
    <p>{{ $alarmCateg->added_by }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/alarmCategs.fields.created_at').':') !!}
    <p>{{ $alarmCateg->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/alarmCategs.fields.updated_at').':') !!}
    <p>{{ $alarmCateg->updated_at }}</p>
</div>

