<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/offices.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control text-sm   py-1','placeholder'=>'Office Name']) !!}
</div>

<!-- Region Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('region_id', __('models/offices.fields.region_id').':') !!}
    @if (empty($office))
    {!! Form::select('region_id', $regions, null, ['class' => 'shadow  border text-sm rounded w-full py-1 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline','placeholder'=>'Region Name']) !!}
    @else
    {!! Form::select('region_id', $regions, $office->region_id, ['class' => 'shadow  border text-sm rounded w-full py-1 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline','placeholder'=>'Region Name']) !!}
    @endif
</div>
