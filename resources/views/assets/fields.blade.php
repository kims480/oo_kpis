<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/assets.fields.name').':') !!}

    {!! Form::text('name', $asset->name??null, ['class' => 'form-control']) !!}
</div>
