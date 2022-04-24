

<!-- main Categ Id Field -->

<div class="form-group col-sm-6">
    {!! Form::label('main_categ_id', __('models/snags.fields.main_categ').':') !!}
    @if (empty($snag))
    {!! Form::select('sub_categ_id', $main_categ->pluck('name','id'), null, ['class' => 'shadow  border text-sm rounded w-full py-1 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline','placeholder'=>'Region Name']) !!}
    @else
    {!! Form::select('main_categ_id', $main_categ->pluck('name','id'), $snag->subcateg_id, ['class' => 'shadow  border text-sm rounded w-full py-1 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline','placeholder'=>'Region Name']) !!}
    @endif
</div>

<!-- Sub Categ Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_categ_id', __('models/snags.fields.sub_categ').':') !!}
    @if (empty($snag))
    {!! Form::select('sub_categ_id', $sub_categ->pluck('name','id'), null, ['class' => 'shadow  border text-sm rounded w-full py-1 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline','placeholder'=>'Region Name']) !!}
    @else
    {!! Form::select('sub_categ_id', $sub_categ->pluck('description','id'), $snag->sub_categ->main_categ->id, ['class' => 'shadow  border text-sm rounded w-full py-1 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline','placeholder'=>'Region Name']) !!}
    @endif
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/snags.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control text-sm   py-1','placeholder'=>'Office Name']) !!}
</div>
