<!-- Site  Deployed Field -->
<div class="form-group col-sm-6">
    {!! Form::label('site__deployed', __('models/batteryAdds.fields.site__deployed') . ':') !!}
    {!! Form::text('site__deployed', null, ['class' => 'form-control']) !!}
</div>

<!-- Shelter Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shelter_num', __('models/batteryAdds.fields.shelter_num') . ':') !!}
    {!! Form::number('shelter_num', null, ['class' => 'form-control']) !!}
</div>

<!-- Ref Wo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ref_wo', __('models/batteryAdds.fields.ref_wo') . ':') !!}
    {!! Form::text('ref_wo', null, ['class' => 'form-control']) !!}
</div>

<!-- Ref Cr Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ref_cr', __('models/batteryAdds.fields.ref_cr') . ':') !!}
    {!! Form::text('ref_cr', null, ['class' => 'form-control']) !!}
</div>

<!-- Batter 1 Sn Field -->
<div class="flex flex-wrap justify-between">
    <div class="form-group col-sm-6">
        {!! Form::label('batter_1_sn', __('models/batteryAdds.fields.batter_1_sn') . ':') !!}
        {!! Form::text('batter_1_sn', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('batter_2_sn', __('models/batteryAdds.fields.batter_2_sn') . ':') !!}
        {!! Form::text('batter_2_sn', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('batter_3_sn', __('models/batteryAdds.fields.batter_3_sn') . ':') !!}
        {!! Form::text('batter_3_sn', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('batter_4_sn', __('models/batteryAdds.fields.batter_4_sn') . ':') !!}
        {!! Form::text('batter_4_sn', null, ['class' => 'form-control']) !!}
    </div>

</div>

<!-- Num Of Rect Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num_of_rect', __('models/batteryAdds.fields.num_of_rect') . ':') !!}
    {!! Form::number('num_of_rect', null, ['class' => 'form-control']) !!}
</div>

<!-- Rect Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rect_num', __('models/batteryAdds.fields.rect_num') . ':') !!}
    {!! Form::number('rect_num', null, ['class' => 'form-control']) !!}
</div>

<!-- Bank Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_num', __('models/batteryAdds.fields.bank_num') . ':') !!}
    {!! Form::number('bank_num', null, ['class' => 'form-control']) !!}
</div>

<!-- Install Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('install_date', __('models/batteryAdds.fields.install_date') . ':') !!}
    {!! Form::date('install_date', null, ['class' => 'form-control', 'id' => 'install_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#install_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Aircon Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aircon_status', __('models/batteryAdds.fields.aircon_status') . ':') !!}
    {!! Form::select('aircon_status', [1 => 'Good', 0 => 'Bad'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Rect Charge Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rect_charge_status', __('models/batteryAdds.fields.rect_charge_status') . ':') !!}
    {!! Form::select('rect_charge_status', [1 => 'Good', 0 => 'Bad'], null, [
        'class' => 'form-control custom-select',
    ]) !!}
</div>


<!-- Old Batteries Aging Field -->
<div class="form-group col-sm-6">
    {!! Form::label('old_batteries_aging', __('models/batteryAdds.fields.old_batteries_aging') . ':') !!}
    {!! Form::number('old_batteries_aging', null, ['class' => 'form-control']) !!}
</div>

<!-- Llvd Field -->
<div class="form-group col-sm-6">
    {!! Form::label('llvd', __('models/batteryAdds.fields.llvd') . ':') !!}
    {!! Form::text('llvd', null, ['class' => 'form-control']) !!}
</div>

<!-- Blvd Field -->
<div class="form-group col-sm-6">
    {!! Form::label('blvd', __('models/batteryAdds.fields.blvd') . ':') !!}
    {!! Form::text('blvd', null, ['class' => 'form-control']) !!}
</div>
