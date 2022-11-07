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
    {!! Form::number('shelter_num',null, ['class' => 'form-control','min'=>0,'max'=>10,'placeholder'=>'Enter Selter number']) !!}
</div>

<!-- Ref Wo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ref_wo', __('models/batteryAdds.fields.ref_wo') . ':') !!}
    {!! Form::text('ref_wo', null, ['class' => 'form-control','placeholder'=>'Enter WO number']) !!}
</div>

<!-- Ref Cr Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ref_cr', __('models/batteryAdds.fields.ref_cr') . ':') !!}
    {!! Form::text('ref_cr', null, ['class' => 'form-control','placeholder'=>'Enter CR number']) !!}
</div>
<!-- Load Vlot Before Cr Start -->
<div class="form-group col-sm-6">
    {!! Form::label('volt_before', __('models/batteryAdds.fields.volt_before') . ':') !!}
    {!! Form::number('volt_before', null, ['class' => 'form-control' ,'placeholder'=>'Volt before Activity']) !!}
</div>
<!-- Load Amp Before Cr Start -->
<div class="form-group col-sm-6">
    {!! Form::label('Amp_before', __('models/batteryAdds.fields.Amp_before') . ':') !!}
    {!! Form::number('Amp_before', null, ['class' => 'form-control','placeholder'=>'Ampere Befroe Activity']) !!}
</div>

<!-- Batter 1 Sn Field -->
<div class="w-full flex flex-wrap justify-between py-2 my-2  border-cyan-700 border border-solid rounded-sm bg-slate-100">
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
    {!! Form::number('num_of_rect', null, ['class' => 'form-control','min'=>1,'max'=>10,'placeholder'=>'How many Rectifiers on site?']) !!}
</div>

<!-- Rect Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rect_num', __('models/batteryAdds.fields.rect_num') . ':') !!}
    {!! Form::number('rect_num', null, ['class' => 'form-control','min'=>1,'max'=>10,'placeholder'=>'Which Rectifier Used for this Batteries?']) !!}
</div>

<!-- Bank Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_num', __('models/batteryAdds.fields.bank_num') . ':') !!}
    {!! Form::number('bank_num', null, ['class' => 'form-control','min'=>1,'max'=>20,'placeholder'=>'Which Batteru Bank this batteries?']) !!}
</div>

<!-- Install Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('install_date', __('models/batteryAdds.fields.install_date') . ':') !!}
    {!! Form::date('install_date', null, ['class' => 'form-control', 'id' => 'install_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        // $('#install_date').datetimepicker({
        //     format: 'YYYY-MM-DD',
        //     useCurrent: true,
        //     sideBySide: true
        // });

            // const element = document.querySelector('.snags-list');
            const choices = new Choices(document.querySelector('.snags-list'));
    </script>
@endpush

<!-- Aircon Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aircon_status', __('models/batteryAdds.fields.aircon_status') . ':') !!}
    {!! Form::select('aircon_status', [1 => 'Good', 0 => 'Bad'], 0, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Rect Charge Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rect_charge_status', __('models/batteryAdds.fields.rect_charge_status') . ':') !!}
    {!! Form::select('rect_charge_status', [1 => 'Good', 0 => 'Bad'], 1, [
        'class' => 'form-control custom-select','placeholder'=>'Rectifier Charging Status'
    ]) !!}
</div>


<!-- Old Batteries Aging Field -->
<div class="form-group col-sm-6">
    {!! Form::label('old_batteries_aging', __('models/batteryAdds.fields.old_batteries_aging') . ':') !!}
    {!! Form::number('old_batteries_aging', null, ['class' => 'form-control','min'=>0,'max'=>10,'placeholder'=>'Old Batteries Aging']) !!}
</div>

<!-- Llvd Field -->
<div class="form-group col-sm-6">
    {!! Form::label('llvd', __('models/batteryAdds.fields.llvd') . ':') !!}
    {!! Form::number('llvd', null, ['class' => 'form-control','placeholder'=>'LLVD Value in rectifier (46v)' ]) !!}
</div>

<!-- Blvd Field -->
<div class="form-group col-sm-6">
    {!! Form::label('blvd', __('models/batteryAdds.fields.blvd') . ':') !!}
    {!! Form::number('blvd', null, ['class' => 'form-control','placeholder'=>'BLVD Value in rectifier (43.2v)']) !!}
</div>
<!-- Capacity Rating Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capacity_rating', __('models/batteryAdds.fields.capacity_rating') . ':') !!}
    {!! Form::number('capacity_rating', null, ['class' => 'form-control','placeholder'=>'Capacity Ratin Should match batteries rating']) !!}
</div>
<!-- Battery Brand Field -->
<div class="form-group col-sm-6">
    {!! Form::label('battery_brand', __('models/batteryAdds.fields.battery_brand') . ':') !!}
    {!! Form::text('battery_brand', null, ['class' => 'form-control','placeholder'=>'Batteries manufacturer']) !!}
</div>
<!-- Battery Model Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Battery_model', __('models/batteryAdds.fields.Battery_model') . ':') !!}
    {!! Form::text('Battery_model', null, ['class' => 'form-control','placeholder'=>'Batteries Model']) !!}
</div>
<!-- Voltage Testing after Install Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Volt_after', __('models/batteryAdds.fields.Volt_after') . ':') !!}
    {!! Form::number('Volt_after', null, ['class' => 'form-control','placeholder'=>'Volt After Replacing Batteries']) !!}
</div>
<!-- Ampere Testing after Install Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Amp_After', __('models/batteryAdds.fields.Amp_After') . ':') !!}
    {!! Form::number('Amp_After', null, ['class' => 'form-control','placeholder'=>'Ampere After Replacing Batteries']) !!}
</div>
<!-- Remarks -->
<div class="form-group col-sm-6">
    {!! Form::label('remarks', __('models/batteryAdds.fields.remarks') . ':') !!}
    {!! Form::text('remarks', null, ['class' => 'form-control','placeholder'=>'Please add if any remarks']) !!}
</div>
