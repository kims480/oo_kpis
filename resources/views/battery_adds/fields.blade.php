<!-- Site  Deployed Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('site__deployed', __('models/batteryAdds.fields.site__deployed') . ':') !!}<small class="text-red-800 text-base font-bold">*</small>
    {!! Form::text('site__deployed', null, ['class' => 'form-control']) !!}
</div> --}}
<div class="w-full">
    <x-alert type="error" title="Warning" message="All Data photos to be reflected on Autin"></x-alert>
    {{ $errors }}
</div>
<div class="form-groub p-1 px-2 col-sm-6 sm:w-full md:w-1/2 ">
    @livewire('site-list')
</div>

<!-- Shelter Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shelter_num', __('models/batteryAdds.fields.shelter_num') . ':') !!}
    {!! Form::number('shelter_num', null, [
        'class' =>  $errors->any()? ( $errors->has('shelter_num') ? ' is-invalid': 'is-valid'):null,
        'min' => 1,
        'max' => 10,
        'placeholder' => 'Enter Selter number',
    ]) !!}
    @error('shelter_num')
        <div class="text-red-600 text-xs">{{ $message }}</div>
    @enderror
</div>

<!-- Ref Wo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ref_wo', __('models/batteryAdds.fields.ref_wo') . ':') !!}
    {!! Form::text('ref_wo', old('ref_wo'), [
        'class' =>  $errors->any()? ($errors->has('ref_wo') ? ' is-invalid': 'is-valid'):null,
        'placeholder' => 'Enter WO number',
    ]) !!}
    @error('ref_wo')
        <div class="text-red-600 text-xs">{{ $message }}</div>
    @enderror
</div>

<!-- Ref Cr Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ref_cr', __('models/batteryAdds.fields.ref_cr') . ':') !!}
    {!! Form::text('ref_cr', old('ref_cr'), [
        'class' =>  '',
        'placeholder' => 'Enter CR number',
    ]) !!}

</div>
<!-- Load Vlot Before Cr Start -->
<div class="form-group col-sm-6">
    {!! Form::label('volt_before', __('models/batteryAdds.fields.volt_before') . ':') !!}
    {!! Form::number('volt_before', old('volt_before'), [
        'class' =>  $errors->any()? ($errors->has('volt_before') ? ' is-invalid': 'is-valid'):null,
        'placeholder' => 'Volt before Activity',
        'min' => 46,
        'max' => 64,
        'step' => 0.1,
    ]) !!}
    @error('volt_before')
        <div class="text-red-600 text-xs">{{ $message }}</div>
    @enderror
</div>
<!-- Load Amp Before Cr Start -->
<div class="form-group col-sm-6">
    {!! Form::label('Amp_before', __('models/batteryAdds.fields.Amp_before') . ':') !!}
    {!! Form::number('Amp_before', old('Amp_before'), [
        'class' =>  $errors->any()? ($errors->has('Amp_before') ? ' is-invalid': 'is-valid'):null,
        'placeholder' => 'Ampere Befroe Activity',
        'min' => 1,
        'max' => 200,
        'step' => 0.01,
    ]) !!}
    @error('Amp_before')
        <div class="text-red-600 text-xs">{{ $message }}</div>
    @enderror
</div>

<!-- Batter 1 Sn Field -->
<div
    class="w-full flex flex-wrap justify-between py-2 my-2  border-cyan-700 border border-solid rounded-sm bg-slate-100">
    <div class="form-group col-sm-6">
        {!! Form::label('batter_1_sn', __('models/batteryAdds.fields.batter_1_sn') . ':') !!}<small class="text-red-800 text-base font-bold">*</small>
        {!! Form::text('batter_1_sn', old('batter_1_sn'), [
            'class' =>  $errors->any()? ($errors->has('batter_1_sn') ? ' is-invalid': 'is-valid'):null,
        ]) !!}
        @error('batter_1_sn')
            <div class="text-red-600 text-xs">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('battery_2_sn', __('models/batteryAdds.fields.battery_2_sn') . ':') !!}<small class="text-red-800 text-base font-bold">*</small>
        {!! Form::text('battery_2_sn', old('battery_2_sn'), [
            'class' =>  $errors->any()? ($errors->has('battery_2_sn') ? ' is-invalid': 'is-valid'):null,
        ]) !!}
        @error('battery_2_sn')
            <div class="text-red-600 text-xs">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('battery_3_sn', __('models/batteryAdds.fields.battery_3_sn') . ':') !!}<small class="text-red-800 text-base font-bold">*</small>
        {!! Form::text('battery_3_sn', old('battery_3_sn'), [
            'class' =>  $errors->any()? ($errors->has('battery_3_sn') ? ' is-invalid': 'is-valid'):null,
        ]) !!}
        @error('battery_3_sn')
            <div class="text-red-600 text-xs">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('battery_4_sn', __('models/batteryAdds.fields.battery_4_sn') . ':') !!}<small class="text-red-800 text-base font-bold">*</small>
        {!! Form::text('battery_4_sn', old('battery_4_sn'), [
            'class' =>  $errors->any()? ($errors->has('battery_4_sn') ? ' is-invalid': 'is-valid'):null,
        ]) !!}
        @error('battery_4_sn')
            <div class="text-red-600 text-xs">{{ $message }}</div>
        @enderror
    </div>

</div>

<!-- Num Of Rect Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num_of_rect', __('models/batteryAdds.fields.num_of_rect') . ':') !!}
    {!! Form::number('num_of_rect', old('num_of_rect'), [
        'class' =>  $errors->any()? ($errors->has('num_of_rect') ? ' is-invalid': 'is-valid'):null,
        'min' => 1,
        'max' => 10,
        'placeholder' => 'How many Rectifiers on site?',
    ]) !!}
    @error('num_of_rect')
        <div class="text-red-600 text-xs">{{ $message }}</div>
    @enderror
</div>

<!-- Rect Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rect_num', __('models/batteryAdds.fields.rect_num') . ':') !!}
    {!! Form::number('rect_num', old('rect_num'), [
        'class' =>  $errors->any()? ($errors->has('rect_num') ? ' is-invalid': 'is-valid'):null,
        'min' => 1,
        'max' => 10,
        'placeholder' => 'Which Rectifier Used for this Batteries?',
    ]) !!}
    @error('rect_num')
        <div class="text-red-600 text-xs">{{ $message }}</div>
    @enderror
</div>

<!-- Bank Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_num', __('models/batteryAdds.fields.bank_num') . ':') !!}
    {!! Form::number('bank_num', old('bank_num'), [
        'class' =>  $errors->any()? ($errors->has('bank_num') ? ' is-invalid': 'is-valid'):null,
        'min' => 1,
        'max' => 20,
        'placeholder' => 'Which Batteru Bank this batteries?',
    ]) !!}
    @error('bank_num')
        <div class="text-red-600 text-xs">{{ $message }}</div>
    @enderror
</div>

<!-- Install Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('install_date', __('models/batteryAdds.fields.install_date') . ':') !!}
    {!! Form::date('install_date', old('install_date'), [
        'class' => 'form-control' ,
        'id' => 'install_date',
    ]) !!}
    @error('install_date')
        <div class="text-red-600 text-xs">{{ $message }}</div>
    @enderror
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
            'class' => 'form-control custom-select',
            'placeholder' => 'Rectifier Charging Status',
        ]) !!}
    </div>


    <!-- Old Batteries Aging Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('old_batteries_aging', __('models/batteryAdds.fields.old_batteries_aging') . ':') !!}
        {!! Form::number('old_batteries_aging', old('old_batteries_aging'), [
            'class' =>  $errors->any()? ($errors->has('old_batteries_aging') ? ' is-invalid': 'is-valid'):null,
            'min' => 0,
            'max' => 10,
            'placeholder' => 'Old Batteries Aging',
        ]) !!}

    </div>

    <!-- Llvd Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('llvd', __('models/batteryAdds.fields.llvd') . ':') !!}
        {!! Form::number('llvd', old('llvd'), [
            'class' =>  $errors->any()? ($errors->has('llvd') ? ' is-invalid': 'is-valid'):null,
            'placeholder' => 'LLVD Value in rectifier (46v)',
            'min' => 46,
            'max' => 64,
            'step' => 0.1,
        ]) !!}
        @error('llvd')
            <div class="text-red-600 text-xs">{{ $message }}</div>
        @enderror
    </div>

    <!-- Blvd Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('blvd', __('models/batteryAdds.fields.blvd') . ':') !!}
        {!! Form::number('blvd', old('blvd'), [
            'class' =>  $errors->any()? ($errors->has('blvd') ? ' is-invalid': 'is-valid'):null,
            'placeholder' => 'BLVD Value in rectifier (43.2v)',
            'min' => 42,
            'max' => 48,
            'step' => 0.1,
        ]) !!}
        @error('blvd')
            <div class="text-red-600 text-xs">{{ $message }}</div>
        @enderror
    </div>
    <!-- Capacity Rating Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('capacity_rating', __('models/batteryAdds.fields.capacity_rating') . ':') !!}
        {!! Form::number('capacity_rating', old('capacity_rating'), [
            'class' =>  $errors->any()? ($errors->has('capacity_rating') ? ' is-invalid': 'is-valid'):null,
            'placeholder' => 'Capacity Ratin Should match batteries rating (Ah)',
            'min' => 90,
            'max' => 400,
            'step' => 10,
        ]) !!}
        @error('capacity_rating')
            <div class="text-red-600 text-xs">{{ $message }}</div>
        @enderror
    </div>
    <!-- Battery Brand Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('battery_brand', __('models/batteryAdds.fields.battery_brand') . ':') !!}
        {!! Form::text('battery_brand', 'SACRED SUN', [
            'class' =>  $errors->any()? ($errors->has('battery_brand') ? ' is-invalid': 'is-valid'):null,
            'placeholder' => 'Batteries manufacturer',
        ]) !!}
        @error('battery_brand')
            <div class="text-red-600 text-xs">{{ $message }}</div>
        @enderror
    </div>
    <!-- Battery Model Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('Battery_model', __('models/batteryAdds.fields.Battery_model') . ':') !!}
        {!! Form::text('Battery_model', 'FTA12-190A', [
            $errors->any()? ($errors->has('Battery_model') ? ' is-invalid': 'is-valid'):null,
             'placeholder' => 'Batteries Model']) !!}
        @error('Battery_model')
            <div class="text-red-600 text-xs">{{ $message }}</div>
        @enderror
    </div>
    <!-- Voltage Testing after Install Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('Volt_after', __('models/batteryAdds.fields.Volt_after') . ':') !!}
        {!! Form::number('Volt_after', old('Volt_after'), [
            'class' =>  $errors->any()? ($errors->has('Volt_after') ? ' is-invalid': 'is-valid'):null,
            'placeholder' => 'Volt After Replacing Batteries',
            'min' => 46,
            'max' => 64,
            'step' => 0.1,
        ]) !!}
        @error('Volt_after')
            <div class="text-red-600 text-xs">{{ $message }}</div>
        @enderror
    </div>
    <!-- Ampere Testing after Install Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('Amp_After', __('models/batteryAdds.fields.Amp_After') . ':') !!}
        {!! Form::number('Amp_After', old('Amp_After'), [
            'class' =>  $errors->any()? ($errors->has('Amp_After') ? ' is-invalid': 'is-valid'):null,
            'placeholder' => 'Ampere After Replacing Batteries',
            'min' => 1,
            'max' => 200,
            'step' => 0.01,
        ]) !!}
        @error('Amp_After')
            <div class="text-red-600 text-xs">{{ $message }}</div>
        @enderror
    </div>
    <!-- Remarks -->
    <div class="form-group col-sm-6">
        {!! Form::label('remarks', __('models/batteryAdds.fields.remarks') . ':') !!}
        {!! Form::text('remarks', old('remarks'), [
            'class' =>  $errors->any()? ($errors->has('remarks') ? ' is-invalid': 'is-valid'):null,
            'placeholder' => 'Please add if any remarks',
        ]) !!}
        @error('remarks')
            <div class="text-red-600 text-xs">{{ $message }}</div>
        @enderror
    </div>
