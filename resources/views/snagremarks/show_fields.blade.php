<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/snagremarks.fields.id').':') !!}
    <p>{{ $snagremark->id }}</p>
</div>

<!-- Remark Field -->
<div class="col-sm-12">
    {!! Form::label('remark', __('models/snagremarks.fields.remark').':') !!}
    <p>{{ $snagremark->remark }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/snagremarks.fields.created_at').':') !!}
    <p>{{ $snagremark->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/snagremarks.fields.updated_at').':') !!}
    <p>{{ $snagremark->updated_at }}</p>
</div>

