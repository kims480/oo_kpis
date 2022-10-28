<!-- Id Field -->
<div class="container flex w-full flex-wrap justify-items-stretch flex-col">
<div class="col-sm-12">
    {!! Form::label('id', __('models/batteryAdds.fields.id').':') !!}
    <p>{{ $batteryAdd->id }}</p>
</div>

<!-- Site  Deployed Field -->
<div class="col-sm-12">
    {!! Form::label('site__deployed', __('models/batteryAdds.fields.site__deployed').':') !!}
    <p>{{ $batteryAdd->site__deployed }}</p>
</div>

<!-- Shelter Num Field -->
<div class="col-sm-12">
    {!! Form::label('shelter_num', __('models/batteryAdds.fields.shelter_num').':') !!}
    <p>{{ $batteryAdd->shelter_num }}</p>
</div>

<!-- Ref Wo Field -->
<div class="col-sm-12">
    {!! Form::label('ref_wo', __('models/batteryAdds.fields.ref_wo').':') !!}
    <p>{{ $batteryAdd->ref_wo }}</p>
</div>

<!-- Ref Cr Field -->
<div class="col-sm-12">
    {!! Form::label('ref_cr', __('models/batteryAdds.fields.ref_cr').':') !!}
    <p>{{ $batteryAdd->ref_cr }}</p>
</div>

<!-- Batter 1 Sn Field -->
<div class="col-sm-12">
    {!! Form::label('batter_1_sn', __('models/batteryAdds.fields.batter_1_sn').':') !!}
    <p>{{ $batteryAdd->batter_1_sn }}</p>
</div>

<!-- Num Of Rect Field -->
<div class="col-sm-12">
    {!! Form::label('num_of_rect', __('models/batteryAdds.fields.num_of_rect').':') !!}
    <p>{{ $batteryAdd->num_of_rect }}</p>
</div>

<!-- Rect Num Field -->
<div class="col-sm-12">
    {!! Form::label('rect_num', __('models/batteryAdds.fields.rect_num').':') !!}
    <p>{{ $batteryAdd->rect_num }}</p>
</div>

<!-- Bank Num Field -->
<div class="col-sm-12">
    {!! Form::label('bank_num', __('models/batteryAdds.fields.bank_num').':') !!}
    <p>{{ $batteryAdd->bank_num }}</p>
</div>

<!-- Install Date Field -->
<div class="col-sm-12">
    {!! Form::label('install_date', __('models/batteryAdds.fields.install_date').':') !!}
    <p>{{ $batteryAdd->install_date }}</p>
</div>

<!-- Aircon Status Field -->
<div class="col-sm-12">
    {!! Form::label('aircon_status', __('models/batteryAdds.fields.aircon_status').':') !!}
    <p>{{ $batteryAdd->aircon_status }}</p>
</div>

<!-- Rect Charge Status Field -->
<div class="col-sm-12">
    {!! Form::label('rect_charge_status', __('models/batteryAdds.fields.rect_charge_status').':') !!}
    <p>{{ $batteryAdd->rect_charge_status }}</p>
</div>

<!-- Old Batteries Aging Field -->
<div class="col-sm-12">
    {!! Form::label('old_batteries_aging', __('models/batteryAdds.fields.old_batteries_aging').':') !!}
    <p>{{ $batteryAdd->old_batteries_aging }}</p>
</div>

<!-- Llvd Field -->
<div class="col-sm-12">
    {!! Form::label('llvd', __('models/batteryAdds.fields.llvd').':') !!}
    <p>{{ $batteryAdd->llvd }}</p>
</div>

<!-- Blvd Field -->
<div class="col-sm-12">
    {!! Form::label('blvd', __('models/batteryAdds.fields.blvd').':') !!}
    <p>{{ $batteryAdd->blvd }}</p>
</div>
</div>
