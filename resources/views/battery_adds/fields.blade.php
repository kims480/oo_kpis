<!-- Site  Deployed Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('site__deployed', __('models/batteryAdds.fields.site__deployed') . ':') !!}<small class="text-red-800 text-base font-bold">*</small>
    {!! Form::text('site__deployed', null, ['class' => 'form-control']) !!}
</div> --}}
<div class="w-full">
<x-alert type="error" title="Warning" message="All Data photos to be reflected on Autin"></x-alert>
</div>
<div class="form-groub p-1 px-2 col-sm-6 sm:w-full md:w-1/2">
@livewire('site-list')
</div>

<!-- Shelter Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shelter_num', __('models/batteryAdds.fields.shelter_num') . ':') !!}
    {!! Form::number('shelter_num', 1, ['class' => 'form-control','min'=>0,'max'=>10]) !!}
</div>

<!-- Ref Wo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ref_wo', __('models/batteryAdds.fields.ref_wo') . ':') !!}
    {!! Form::text('ref_wo', "CM-2022...", ['class' => 'form-control']) !!}
</div>

<!-- Ref Cr Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ref_cr', __('models/batteryAdds.fields.ref_cr') . ':') !!}
    {!! Form::text('ref_cr', "CR-2022...", ['class' => 'form-control']) !!}
</div>
<!-- Load Vlot Before Cr Start -->
<div class="form-group col-sm-6">
    {!! Form::label('volt_before', __('models/batteryAdds.fields.volt_before') . ':') !!}
    {!! Form::text('volt_before', "", ['class' => 'form-control']) !!}
</div>
<!-- Load Amp Before Cr Start -->
<div class="form-group col-sm-6">
    {!! Form::label('Amp_before', __('models/batteryAdds.fields.Amp_before') . ':') !!}
    {!! Form::text('Amp_before', "", ['class' => 'form-control']) !!}
</div>

<!-- Batter 1 Sn Field -->
<div class="w-full flex flex-wrap justify-between py-2  border-cyan-700 border border-solid rounded-sm bg-slate-100">
    <div class="form-group col-sm-6">
        {!! Form::label('batter_1_sn', __('models/batteryAdds.fields.batter_1_sn') . ':') !!}<small class="text-red-800 text-base font-bold">*</small>
        {!! Form::text('batter_1_sn', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('battery_2_sn', __('models/batteryAdds.fields.battery_2_sn') . ':') !!}<small class="text-red-800 text-base font-bold">*</small>
        {!! Form::text('battery_2_sn', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('battery_3_sn', __('models/batteryAdds.fields.battery_3_sn') . ':') !!}<small class="text-red-800 text-base font-bold">*</small>
        {!! Form::text('battery_3_sn', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('battery_4_sn', __('models/batteryAdds.fields.battery_4_sn') . ':') !!}<small class="text-red-800 text-base font-bold">*</small>
        {!! Form::text('battery_4_sn', null, ['class' => 'form-control']) !!}
    </div>

</div>

<!-- Num Of Rect Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num_of_rect', __('models/batteryAdds.fields.num_of_rect') . ':') !!}
    {!! Form::number('num_of_rect', 1, ['class' => 'form-control','min'=>1,'max'=>10]) !!}
</div>

<!-- Rect Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rect_num', __('models/batteryAdds.fields.rect_num') . ':') !!}
    {!! Form::number('rect_num', 1, ['class' => 'form-control','min'=>1,'max'=>10]) !!}
</div>

<!-- Bank Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_num', __('models/batteryAdds.fields.bank_num') . ':') !!}
    {!! Form::number('bank_num', 1, ['class' => 'form-control','min'=>1,'max'=>20]) !!}
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
    {!! Form::number('old_batteries_aging', 5, ['class' => 'form-control','min'=>0,'max'=>10]) !!}
</div>

<!-- Llvd Field -->
<div class="form-group col-sm-6">
    {!! Form::label('llvd', __('models/batteryAdds.fields.llvd') . ':') !!}
    {!! Form::text('llvd', "46", ['class' => 'form-control' ]) !!}
</div>

<!-- Blvd Field -->
<div class="form-group col-sm-6">
    {!! Form::label('blvd', __('models/batteryAdds.fields.blvd') . ':') !!}
    {!! Form::text('blvd', '43.2', ['class' => 'form-control']) !!}
</div>
<!-- Capacity Rating Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capacity_rating', __('models/batteryAdds.fields.capacity_rating') . ':') !!}
    {!! Form::text('capacity_rating', '', ['class' => 'form-control']) !!}
</div>
<!-- Battery Brand Field -->
<div class="form-group col-sm-6">
    {!! Form::label('battery_brand', __('models/batteryAdds.fields.battery_brand') . ':') !!}
    {!! Form::text('battery_brand', '', ['class' => 'form-control']) !!}
</div>
<!-- Battery Model Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Battery_model', __('models/batteryAdds.fields.Battery_model') . ':') !!}
    {!! Form::text('Battery_model', '', ['class' => 'form-control']) !!}
</div>
<!-- Voltage Testing after Install Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Volt_after', __('models/batteryAdds.fields.Volt_after') . ':') !!}
    {!! Form::text('Volt_after', '', ['class' => 'form-control']) !!}
</div>
<!-- Ampere Testing after Install Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Amp_After', __('models/batteryAdds.fields.Amp_After') . ':') !!}
    {!! Form::text('Amp_After', '', ['class' => 'form-control']) !!}
</div>
<!-- Remarks -->
<div class="form-group col-sm-6">
    {!! Form::label('remarks', __('models/batteryAdds.fields.remarks') . ':') !!}
    {!! Form::text('remarks', '', ['class' => 'form-control']) !!}
</div>
